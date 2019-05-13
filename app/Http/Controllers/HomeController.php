<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;
use App\User;
use App\Message;
use Auth;
use Calendar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Auth::user()->staff_id;
        if($staff == '1')
        {
            $events = Rental::all();
            $jml_trkonfir = Rental::where('status','terkonfirmasi')->count();
            $jml_blmtrkonfir = Rental::where('status','belum terkonfirmasi')->count();
            $jml_msg = Message::count();
            $jml_user = User::count();
        }
        else
        {
            $events = Rental::where('staff_id', $staff)->get();
            $jml_trkonfir = Rental::where('staff_id', $staff)->where('status','terkonfirmasi')->count();
            $jml_blmtrkonfir = Rental::where('staff_id', $staff)->where('status','belum terkonfirmasi')->count();
            $jml_msg = Message::where('staff_id', $staff)->count();
            $jml_user = User::where('staff_id', $staff)->count();
        }
        
        $event_list = [];
        foreach ($events as $key => $event)
        {
            $event_list[] = Calendar::event(
                $event->room->room,
                true,
                new \DateTime($event->tgl_awal),
                new \DateTime($event->tgl_akhir.' +1 day '),
                null,
                    // Add color and link on event
	                [
	                    'color' => $event->color,
	                    'url' => route('home.show', $event->id),
	                ]
            );
        }
        $calendar_details = Calendar::addEvents($event_list);
        $ok = "N";

        return view('backend.dashboard', compact('calendar_details', 'ok', 'jml_trkonfir', 'jml_blmtrkonfir', 'jml_msg', 'jml_user'));
        
    }

    public function show($id)
    {
        $staff = Auth::user()->staff_id;
        if($staff == '1')
        {
            $events = Rental::all();
            $jml_trkonfir = Rental::where('status','terkonfirmasi')->count();
            $jml_blmtrkonfir = Rental::where('status','belum terkonfirmasi')->count();
            $jml_msg = Message::count();
            $jml_user = User::count();
        }
        else
        {
            $events = Rental::where('staff_id', $staff)->get();
            $jml_trkonfir = Rental::where('staff_id', $staff)->where('status','terkonfirmasi')->count();
            $jml_blmtrkonfir = Rental::where('staff_id', $staff)->where('status','belum terkonfirmasi')->count();
            $jml_msg = Message::where('staff_id', $staff)->count();
            $jml_user = User::where('staff_id', $staff)->count();
        }

        $rental = Rental::find($id);

        $event_list = [];
        foreach ($events as $key => $event)
        {
            $event_list[] = Calendar::event(
                $event->room->room,
                true,
                new \DateTime($event->tgl_awal),
                new \DateTime($event->tgl_akhir.' +1 day '),
                null,
                    // Add color and link on event
	                [
	                    'color' => $event->color,
	                    'url' => route('home.show', $event->id),
	                ]
            );
        }
        $calendar_details = Calendar::addEvents($event_list);
        $ok = "Y";

        return view('backend.dashboard', compact('calendar_details', 'ok', 'rental', 'jml_trkonfir', 'jml_blmtrkonfir', 'jml_msg', 'jml_user'));
    }
}
