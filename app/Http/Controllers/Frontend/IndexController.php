<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\FeedbackMail;
use App\models\Booking;
use App\models\Feedback;
use App\models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function index()
    {
        $rooms = Room::with('galleries')->latest()->get();
        return view('front-end.pages.index', compact('rooms'));
    }

    public function roomDetails(Room $room)
    {
        $room->load('category', 'bookings', 'galleries');
        return view('front-end.pages.room-details', compact('room'));
    }

    public function feedback()
    {
        return view('front-end.pages.feedback');
    }
    public function storeFeedback(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|min:6',
        ]);
        $feedback = Feedback::create($data);
        Mail::to('fizaansajjad@hotmail.com')->send(new FeedbackMail($feedback));
        return back()->with('success', 'Feedback submited successfully');
    }

    public function search(Request $request)
    {
        $q = Room::query();
        if ($request->has('search')) {
            $q->where('title', 'LIKE', "%{$request->search}%")
                ->orWhere('description', 'LIKE', "%{$request->search}%");
        }
        if ($request->has('location')) {
            $q->where('address', 'LIKE', "%{$request->location}%");
        }
        $results = $q->get();
        return view('front-end.pages.search-details', compact('results'));
    }
}
