<?php

namespace App\Http\Controllers\Admin;

use App\models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::count();
        return view('admin.dashboard', compact('bookings'));
    }
}
