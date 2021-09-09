<?php

namespace App\Http\Controllers\Frontend;

use URL;
use Alert;
use Input;
use Stripe;
use Session;
use Redirect;
use Validator;
use Carbon\Carbon;
use Stripe\Charge;
use App\models\Room;
use PayPal\Api\Item;
use PayPal\Api\Payer;
use App\Http\Requests;
use PayPal\Api\Amount;
use App\models\Booking;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\ItemList;
use Illuminate\Support\Arr;
use PayPal\Api\Transaction;
use PayPal\Rest\ApiContext;
use Illuminate\Http\Request;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use App\Http\Controllers\Controller;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Config;
use PayPal\Exception\PayPalConnectionException;

class CheckoutController extends Controller
{
    private $_api_context;
    public function __construct()
    {
        $paypal_configuration = config('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_configuration['client_id'], $paypal_configuration['secret']));
        $this->_api_context->setConfig($paypal_configuration['settings']);
    }

    public function index(Room $room)
    {
        $room->load('galleries');
        return view('front-end.pages.checkout-payment-method', compact('room'));
    }

    public function payWithPaypal(Request $request)
    {
        if ($request->payment == 'cash') {
            Booking::updateOrCreate([
                'room_id' => $request->room_id,
            ], [
                'room_id' => $request->room_id,
                'user_id' => auth()->user()->id,
                'cash' => 'cash',
                'status' => 'Booked',
                'renewal_at' => Carbon::now()->addDays(28),
            ]);
            return redirect()->route('index')->with('success', 'Room Booked Successfully');
        }

        if ($request->payment == 'paypal') {
            session()->put('room_id', $request->room_id);
            $payer = new Payer();
            $price = $request->input('price');
            $payer->setPaymentMethod('paypal');

            $item_1 = new Item();
            $item_1->setName('Room Booking')
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($price);

            $amount = new Amount();
            $amount->setCurrency('USD')
                ->setTotal($price);

            $item_list = new ItemList();
            $item_list->setItems(array($item_1));
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Enter Your transaction description');

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(route('status'))
                ->setCancelUrl(route('status'));


            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));

            try {
                $payment->create($this->_api_context);
            } catch (PayPalConnectionException $ex) {
                echo $ex->getCode();
                dd($ex->getData());
                // die($ex);
                // if (Config::get('app.debug'))
                // {
                //     return redirect()->route('index')->with('error','Connection timeout');
                // }
                // else {
                //     return redirect()->route('index')->with('error','Some error occur, sorry for inconvenient');
                // }
            }
            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            session()->put('paypal_payment_id', $payment->getId());
            // dd(session('paypal_payment_id'));

            if (isset($redirect_url)) {
                return redirect()->away($redirect_url);
            }
            return redirect()->route('index')->with('error', 'Unknown error occurred');
        }
    }

    public function getPaymentStatus(Request $request)
    {

        $payment_id = session()->get('paypal_payment_id');
        session()->forget('paypal_payment_id');

        if (empty($request->input('PayerID')) || empty($request->input('token'))) {
            return redirect()->route('index')->with('error', 'Payment failed');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->input('PayerID'));
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            Booking::updateOrCreate([
                'room_id' => session()->get('room_id'),
            ], [
                'room_id' => session()->get('room_id'),
                'user_id' => auth()->user()->id,
                'paypal_id' => $payment_id,
                'status' => 'Booked',
                'renewal_at' => Carbon::now()->addDays(28),
            ]);
            session()->forget('room_id');

            Alert::success('Success', 'Room Booked Successfully');
            return redirect()->route('index');
        }
        return redirect()->route('index')->with('error', 'Payment failed !!');
    }


    // stripe
    public function postPaymentStripe(Request $request)
    {
        $amount = $request->price;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $customer = Stripe\Customer::create(array(
            'email' => auth()->user()->email,
            'source'  => $request->stripeToken
        ));

        $charge = Stripe\Charge::create([
            'customer' => $customer->id,
            "amount" => $amount * 100,
            "currency" => "gbp",
            "description" => "Booking For Room",
        ]);

        Booking::updateOrCreate([
            'room_id' => $request->input('room_id'),
        ], [
            'room_id' => $request->input('room_id'),
            'user_id' => auth()->user()->id,
            'stripe_id' => $customer->id,
            'status' => 'Booked',
            'renewal_at' => Carbon::now()->addDays(28),
        ]);
        Alert::success('Success', 'Room Booked Successfully');
        return redirect()->route('index');
    }
}
