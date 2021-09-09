<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Category;
use App\models\Gallery;
use App\models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::query()
            ->latest()
            ->paginate(10);
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.rooms.create-room', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'attributes.*' => 'required',
            'aminities.*' => 'required',
            'images.*' => 'required|image',
        ]);

        $aminities = array();
        $attributes = array();
        $attributes_req = $request->input('attributes');
        $aminities_req = $request->aminities;

        if ($attributes_req || $aminities_req) {

            foreach ($attributes_req as $attribute) {
                $attributes[] = $attribute;
            }

            foreach ($aminities_req as $aminitie) {
                $aminities[] = $aminitie;
            }
        }

        $room = Room::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'aminities' =>  implode(',', $aminities),
            'attributes' => implode(',', $attributes),
            'address' => $request->input('address'),
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $destinationPath = 'room-images/';
                $filename = time() . $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                Gallery::create([
                    'room_id' => $room->id,
                    'path' => $filename,
                ]);
            }
        }
        return redirect()->route('room.index')->with('success', 'Room created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $categories = Category::all();
        return view('admin.rooms.edit-room', compact('room', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $room->title = $request->title;
        $room->price = $request->price;
        $room->description = $request->description;
        // $room->category_id = $request->category;
        $room->address = $request->address;

        $aminities = array();
        $attributes = array();
        $attributes_req = $request->input('attributes');
        $aminities_req = $request->aminities;

        if ($attributes_req || $aminities_req) {

            foreach ($attributes_req as $attribute) {
                $attributes[] = $attribute;
            }

            foreach ($aminities_req as $aminitie) {
                $aminities[] = $aminitie;
            }
        }
        $room->attributes = implode(',', $attributes);
        $room->aminities = implode(',', $aminities);
        $room->update();

        if ($request->hasFile('images')) {
            $rum = Gallery::where('room_id', $room->id)->get();
            foreach ($rum as $r) {
                $r->delete();
            }
            foreach ($request->file('images') as $image) {
                $destinationPath = 'room-images/';
                $filename = time() . $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                Gallery::create([
                    'room_id' => $room->id,
                    'path' => $filename,
                ]);
            }
        }
        return redirect()->route('room.index')->with('success', 'Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return back()->with('success', 'Room Deleted Successfully');
    }
}
