<?php

namespace App\Http\Controllers\Frontend;

use Alert;
use App\User;
use App\models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $userBookings = Booking::with('user', 'room')
            ->select('user_id', 'room_id', 'created_at', 'renewal_at')
            ->where('user_id', $id)
            ->latest()
            ->get();

        return view('front-end.pages.user-profile', compact('userBookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $old = $request->current_password;
        $userId = User::find(auth()->user()->id);

        if (!Hash::check($old, $userId->password)) {
            Alert::error('Error !', 'You have entered wrong password');
            return redirect()->route('user-profile.index');
        } else {
            $userId = User::find(auth()->user()->id);
            $password = $request->password;
            $pass = Hash::make($password);
            $userId->password = $pass;
            $userId->save();

            Alert::success('Congratulation !', 'Your password updated successfully');
            return redirect()->route('user-profile.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
