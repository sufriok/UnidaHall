<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Staff;
use Auth;

class UserController extends Controller
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
            $users = User::all();
            $tambah = "Y";
        }
        else
        {
            $users = User::where('staff_id', $staff)->get();
            $tambah = "NO";
        }
        
        return view('backend.user.index', compact('users', 'tambah'));
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

        return view('backend.user.create', compact('staff'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->no_hp = $request->no_hp;
            $user->staff_id = $request->staff;
            $user->password = Hash::make($request->password);
            $user->save(); 

        return redirect()->route('user.index')->with('success', 'Input success');
    }

    public function staffStore(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $staff = new Staff;
            $staff->name = $request->name;
            $staff->save(); 

        return redirect()->route('user.create')->with('success', 'Input staff category success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $staff = Auth::user()->staff_id;
        if($staff == '1')
        {
            $staff = Staff::all();
        }
        else
        {
            $staff = Staff::where('id', $staff)->get();
        }
        
        return view('backend.user.edit', compact('user', 'staff'));
        
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
        $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->no_hp = $request->no_hp;
            $user->staff = $request->staff;
            $user->password = Hash::make($request->password);
            $user->push(); 

        return redirect()->route('user.index')->with('success', 'Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index');
    }

}
