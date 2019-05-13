<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;
use App\Room;
use App\Staff;
use App\Message;
use App\Prodi;
use App\Time;
use Calendar;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function schedule()
    {
        $events = Rental::all();
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
	                    'url' => route('frontend.show', $event->id),
	                ]
            );
        }
        $calendar_details = Calendar::addEvents($event_list);

        $halls = Room::all();
        $staffs = Staff::where('id', '>', '1')->get();
        $prodis = Prodi::all();
        $cekcek = Rental::all();
        $times = Time::all();
        $ok = "N";

        return view('frontend.schedule', compact('calendar_details', 'halls', 'staffs', 'prodis', 'ok', 'cekcek', 'times'));
    }

    public function show($id)
    {
        $rental = Rental::find($id);
        $events = Rental::all();
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
	                    'url' => route('frontend.show', $event->id),
	                ]
            );
        }
        $calendar_details = Calendar::addEvents($event_list);

        $halls = Room::all();
        $staffs = Staff::where('id', '>', '1')->get();
        $prodis = Prodi::all();
        $times = Time::all();
        $ok = "Y";

        return view('frontend.schedule', compact('calendar_details', 'halls', 'rental', 'staffs', 'prodis', 'ok', 'times'));
    }

    public function hall()
    {
        $halls = Room::all();

        return view('frontend.hall', compact('halls'));
    }

    public function contact()
    {
        $staffs = Staff::where('id', '>', '1')->get();
        
        return view('frontend.contact', compact('staffs'));
    }

    public function submit(Request $request)
    {
        if ($request->time_id == '1') {
            $warna = "#F9A602";
        }elseif ($request->time_id == '2') {
            $warna = "#F9812A";
        }elseif ($request->time_id == '3') {
            $warna = "#FF4500";
        }
        $aula = $request->room_id;
        $rentals = Rental::where('room_id', $aula)->get();

        if ($rentals == "[]") {

            $destination = "surat";
            $foto = $request->file('surat');
            $extension = $foto->getClientOriginalExtension(); 
            // RENAME THE UPLOAD WITH RANDOM NUMBER 
            $suratName = rand(11111, 33333) . '.' . $extension; 
            // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
            $foto->move($destination, $suratName);
            
            $rental = New Rental;
            $rental->staff_id = $request->staff_id;
            $rental->room_id = $request->room_id;
            $rental->peminjam = $request->peminjam;
            $rental->prodi_id = $request->prodi_id;
            $rental->no_hp = $request->no_hp;
            $rental->alamat = $request->alamat;
            $rental->acara = $request->acara;
            $rental->tgl_awal = $request->tgl_awal;
            $rental->tgl_akhir = $request->tgl_awal;
            $rental->time_id = $request->time_id;
            $rental->surat = $suratName;
            $rental->color = $warna;
            $rental->status = "belum terkonfirmasi";
            $rental->pember_izin = "belum";
            $rental->save();

            return redirect()->route('frontend.schedule')->with('success', 'Input success, dalam waktu 24jam surat anda akan kami cek');

        }else {

            foreach ($rentals as $rental)
            {
                $tgl[] = $rental->tgl_awal;
                $tgls = array_values($tgl);
            }
            
            if(in_array($request->tgl_awal,$tgls)) {

                $seharian = "3";
                $tanggal = $request->tgl_awal;
                $rntls = Rental::where('tgl_awal', $tanggal)->where('room_id', $aula)->get();
                
                foreach ($rntls as $rntl)
                {
                    $time[] = $rntl->time_id;
                    $times = array_values($time);
                }

                if ($request->time_id == $seharian){
                    return back()->withInput()->with('error', 'Input Invalid, Aula yang anda pilih sudah terpinjam pada waktu tersebut');
                }elseif(in_array($seharian,$times)){
                    return back()->withInput()->with('error', 'Input Invalid, Aula yang anda pilih sudah terpinjam pada waktu tersebut');
                }else{
                    
                    if (in_array($request->time_id,$times)){
                        return back()->withInput()->with('error', 'Input Invalid, Aula yang anda pilih sudah terpinjam pada waktu tersebut');
                    } else {
                        
                        $destination = "surat";
                        $foto = $request->file('surat');
                        $extension = $foto->getClientOriginalExtension(); 
                        // RENAME THE UPLOAD WITH RANDOM NUMBER 
                        $suratName = rand(11111, 33333) . '.' . $extension; 
                        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                        $foto->move($destination, $suratName);
                        
                        $rental = New Rental;
                        $rental->staff_id = $request->staff_id;
                        $rental->room_id = $request->room_id;
                        $rental->peminjam = $request->peminjam;
                        $rental->prodi_id = $request->prodi_id;
                        $rental->no_hp = $request->no_hp;
                        $rental->alamat = $request->alamat;
                        $rental->acara = $request->acara;
                        $rental->tgl_awal = $request->tgl_awal;
                        $rental->tgl_akhir = $request->tgl_awal;
                        $rental->time_id = $request->time_id;
                        $rental->surat = $suratName;
                        $rental->color = $warna;
                        $rental->status = "belum terkonfirmasi";
                        $rental->pember_izin = "belum";
                        $rental->save();
    
                        return redirect()->route('frontend.schedule')->with('success', 'Input success, dalam waktu 24jam surat anda akan kami cek');
                    }
                }
                
            }else{
                $destination = "surat";
                $foto = $request->file('surat');
                $extension = $foto->getClientOriginalExtension(); 
                // RENAME THE UPLOAD WITH RANDOM NUMBER 
                $suratName = rand(11111, 33333) . '.' . $extension; 
                // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                $foto->move($destination, $suratName);
                
                $rental = New Rental;
                $rental->staff_id = $request->staff_id;
                $rental->room_id = $request->room_id;
                $rental->peminjam = $request->peminjam;
                $rental->prodi_id = $request->prodi_id;
                $rental->no_hp = $request->no_hp;
                $rental->alamat = $request->alamat;
                $rental->acara = $request->acara;
                $rental->tgl_awal = $request->tgl_awal;
                $rental->tgl_akhir = $request->tgl_awal;
                $rental->time_id = $request->time_id;
                $rental->surat = $suratName;
                $rental->color = $warna;
                $rental->status = "belum terkonfirmasi";
                $rental->pember_izin = "belum";
                $rental->save();

                return redirect()->route('frontend.schedule')->with('success', 'Input success, dalam waktu 24jam surat anda akan kami cek');
            }
        }

    }

    public function send(Request $request)
    {

        $message = new Message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->staff_id = $request->staff_id;
        $message->subject = $request->subject;
        $message->pesan = $request->pesan;
        $message->save(); 

        return redirect()->route('frontend.contact')->with('success', 'Input success');
    }

    
}
