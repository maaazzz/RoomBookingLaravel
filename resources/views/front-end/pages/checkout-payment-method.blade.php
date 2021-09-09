@extends('front-end.layouts.master')

@section('title', 'Booking | Checkout')
@section('styles')
    <style type="text/css">
        .panel-title {
            display: inline;
            font-weight: bold;
        }

        .display-table {
            display: table;
        }

        .display-tr {
            display: table-row;
        }

        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 61%;
        }

    </style>
@endsection
@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <p class="subtitle text-warning">Book your holiday home</p>
                    <h1 class="h2 mb-5"> Confirm and pay </h1>

                    <div class="text-block">
                        <form action="{{ route('paypal') }}" method="post">
                            @csrf
                            <div class="d-flex justify-content-between align-items-end mb-4">
                                <h5 class="mb-0">Select Payment Method</h5>
                                <div class="text-muted"><i class="fa fa-cc-amex fa-2x mr-2"> </i><i
                                        class="fa fa-cc-visa fa-2x mr-2"> </i><i class="fa fa-cc-mastercard fa-2x"></i>
                                </div>
                            </div>
                            <select class="selectpicker form-control mb-3" name="payment" id="form_payment"
                                data-style="btn-selectpicker" required>
                                <option value="" disabled selected>select payment method</option>
                                <option value="paypal">Paypal</option>
                                <option value="stripe">Stripe</option>
                                <option value="cash">Cash</option>
                            </select>
                            <input type="hidden" value="{{ $room->price }}" name="price">
                            <input type="hidden" value="{{ $room->id }}" name="room_id">
                    </div>
                    <div class="row form-block flex-column flex-sm-row">
                        <div class="col text-center text-sm-left"><a class="btn btn-link text-muted"
                                href="{{ route('room.detail', $room->id) }}"> <i
                                    class="fa-chevron-left fa mr-2"></i>Back</a>
                        </div>
                        <div class="col text-center text-sm-right">
                            <button type="submit" class="btn btn-warning px-3" id="payment">Checkout<i
                                    class="fa-chevron-right fa ml-2"></i>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col-lg-5 pl-xl-5">
                    <div class="card border-0 shadow">
                        <div class="card-body p-4">
                            <div class="text-block pb-3">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <h6> <a class="text-reset"
                                                href="{{ route('room.detail', $room->id) }}">{{ $room->title }}</a></h6>
                                        <p class="text-muted text-sm mb-0">{{ $room->address }}</p>
                                    </div>
                                    <a href="{{ route('room.detail', $room->id) }}">
                                        <img class="ml-3 rounded"
                                            src="{{ asset('room-images/' . $room->galleries[0]->path) }}" alt=""
                                            width="100">
                                    </a>
                                </div>
                            </div>
                            @php
                                $start_date = Carbon\Carbon::now();
                                $end_date = Carbon\Carbon::now()->addMonth();
                            @endphp
                            <div class="text-block py-3">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-0"><i
                                            class="fa fa-calendar  text-muted mr-2"></i>{{ date('Y-m-d', strtotime($start_date)) }}
                                        <i
                                            class="fa fa-arrow-right  text-muted mx-3"></i>{{ date('Y-m-d', strtotime($end_date)) }}
                                    </li>
                                </ul>
                            </div>
                            <div class="text-block pt-3 pb-0">
                                <table class="w-100">
                                    <tfoot>
                                        <tr class="border-top">
                                            <th class="pt-3">Total</th>
                                            <td class="font-weight-bold text-right pt-3">${{ $room->price }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="display: none" id="addNewCard">
                <div class="col-md-7">
                    <div class="panel panel-default credit-card-box">
                        <div class="panel-heading display-table">
                            <div class="row display-tr">
                                <h3 class="panel-title display-td">Payment Details</h3>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="{{ route('stripe.charge') }}" method="post"
                                class="require-validation" data-cc-on-file="false"
                                data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                @csrf
                                <div class='form-row row'>
                                    <div class='col-xs-12 form-group col-md-12 required'>
                                        <label class='control-label'>Card Number</label> <input autocomplete='off'
                                            class='form-control card-number' size='20' type='text'>
                                    </div>
                                </div>

                                <div class='form-row row'>
                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                            class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Month</label> <input
                                            class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                                    </div>
                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                        <label class='control-label'>Expiration Year</label> <input
                                            class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                                    </div>
                                </div>
                                <input type="hidden" name="price" value="{{ $room->price }}">
                                <div class='form-row row'>
                                    <div class='col-md-12 error form-group hide'>
                                        <div class='alert-danger alert'>Please correct the errors and try
                                            again.</div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12">
                                        <button class="btn btn-warning btn-lg btn-block" type="submit">Pay Now
                                            {{ $room->price }}</button>
                                    </div>
                                </div>
                                <input type="hidden" value="{{ $room->id }}" name="room_id">
                            </form>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </section>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
            var $form = $(".require-validation");
            $('form.require-validation').bind('submit', function(e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'
                    ].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }

            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    // token contains id, last4, and card type
                    var token = response['id'];
                    // insert the token into the form so it gets submitted to the server
                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });

    </script>

    <script>
        $('#form_payment').on('change', function() {
            if (this.value == 'stripe') {
                $('#addNewCard').fadeIn('slow');
                $('#payment').hide();
                $(this).closest("form").attr("action", "");
                // $('#payment_stripe').show();
            }
        })

        $('#form_payment').on('change', function() {
            if (this.value == 'paypal') {
                $('#addNewCard').hide();
                $('#payment').show();
                $(this).closest("form").attr("action", "{{ route('paypal') }}");
                // $('#payment_stripe').show();
            }
        })

    </script>



@endsection
