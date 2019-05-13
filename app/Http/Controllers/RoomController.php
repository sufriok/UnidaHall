<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Room;
use App\Staff;
use Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Auth::user()->staff_id;
        if($staff == '1')
        {
            $rooms = Room::all();
        }
        else
        {
            $rooms = Room::where('staff_id', $staff)->get();
        }
        
        return view('backend.room.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = Auth::user()->staff_id;
        if($staff == '1')
        {
            $staff = Staff::all();
        }
        else
        {
            $staff = Staff::where('id', $staff)->get();
        }

        return view('backend.room.create', compact('staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $destination = "upload";
        
        $image = $request->file('image');
        $extension = $image->getClientOriginalExtension(); 
        // RENAME THE UPLOAD WITH RANDOM NUMBER 
        $imageName = rand(33334, 55555) . '.' . $extension; 
        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
        $image->move($destination, $imageName);

        $surat = $request->file('surat');
        $extension = $surat->getClientOriginalExtension(); 
        // RENAME THE UPLOAD WITH RANDOM NUMBER 
        $suratName = rand(55556, 88888) . '.' . $extension; 
        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
        $surat->move($destination, $suratName);

        $room = new Room;
        $room->room = $request->room;
        $room->banner = $request->banner;
        $room->max = $request->max;
        $room->image = $imageName;
        $room->staff_id = $request->staff;
        $room->vasilitas = $request->vasilitas;
        $room->pembimbing = $request->pembimbing;
        $room->surat = $suratName;
        $room->save();     

        return redirect()->route('room.index')->with('success', 'Input success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room=Room::find($id);

        return view('backend.room.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::find($id);
        $staffs = Auth::user()->staff_id;
        if($staffs == '1')
        {
            $staff = Staff::all();
        }
        else
        {
            $staff = Staff::where('id', $staffs)->get();
        }
        
        return view('backend.room.edit', compact('room', 'staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $room = Room::find($id);
        if($request->hasFile('image'))
            {
                $destination = "upload";
                $image = $request->file('image');
                $extension = $image->getClientOriginalExtension(); 
                // RENAME THE UPLOAD WITH RANDOM NUMBER 
                $imageName = rand(33334, 55555) . '.' . $extension; 
                // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                $image->move($destination, $imageName);
            }
        else
            {
                $imageName = $room->image;
            }
        
        if($request->hasFile('surat'))
            {
                $destination = "upload";
                $surat = $request->file('surat');
                $extension = $surat->getClientOriginalExtension(); 
                // RENAME THE UPLOAD WITH RANDOM NUMBER 
                $suratName = rand(55556, 88888) . '.' . $extension; 
                // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                $surat->move($destination, $suratName);
            }
        else
            {
                $suratName = $room->surat;
            }
        
        
        $room->room = $request->room;
        $room->banner = $request->banner;
        $room->max = $request->max;
        $room->image = $imageName;
        $room->staff_id = $request->staff;
        $room->vasilitas = $request->vasilitas;
        $room->pembimbing = $request->pembimbing;
        $room->surat = $suratName;
        $room->push();


        return redirect()->route('room.index')->with('success', 'Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room=Room::find($id);
        $room->delete();

        return redirect()->route('room.index');
    }
}

