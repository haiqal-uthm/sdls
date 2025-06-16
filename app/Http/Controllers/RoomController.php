<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function dashboard()
    {
        $rooms = Room::all(); 

        return view('dashboard', compact('rooms'));
    }

    public function show($slug)
    {
        $roomDetails = Room::where('slug', $slug)->firstOrFail();
        return view('room.details', compact('roomDetails'));
    }

    public function details($id)
    {
    // Logic to retrieve room details by $id
    return view('room.details', compact('room'));
    }


    public function edit($slug)
    {
        $roomDetails = Room::where('slug', $slug)->firstOrFail();
        return view('room.edit', compact('roomDetails'));
    }

    public function update(Request $request, $slug)
    {
        $room = Room::where('slug', $slug)->firstOrFail();

        $request->validate([
            'description' => 'required|string',
            'status' => 'required|string|in:Locked,Unlocked,N/A',
        ]);

        $room->description = $request->input('description');
        $room->status = $request->input('status');
        $room->save();

        return redirect()->route('dashboard', ['slug' => $slug])
                        ->with('success', 'Room details updated successfully.');
    }

    public function create()
    {
        return view('room.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:rooms',
            'level' => 'required|string|max:50',
            'status' => 'required|in:Locked,Unlocked,N/A',
            'description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

            Room::create($validated);

        return redirect()->route('dashboard')->with('success', 'Room added successfully!');
    }
}

