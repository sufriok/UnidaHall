<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;
use App\Room;
use App\Staff;
use App\Message;
use App\Prodi;
use App\Time;
use DateTime;
use DatePeriod;
use DateInterval;
use Calendar;

class FrontendController extends Controller
{
    public function index()
    {
        //$tgl1 = "2019-01-28";//pendefinisian tanggal
        //$tgl2 = date('Y-m-d', strtotime('+6 days', strtotime($tgl1)));//operasi penjumlahan tanggal sebanyak 6 hari

        // function getDatesFromRange($start, $end) {
        //     $interval = new DateInterval('P1D'); // PT5M 5 min 
         
        //     $realEnd = new DateTime($end);
        //     $realEnd->add($interval);
         
        //     $period = new DatePeriod(
        //          new DateTime($start),
        //          $interval,
        //          $realEnd
        //     );
         
        //     foreach($period as $date) { 
        //         $array[] = $date->format('Y-m-d'); 
        //     }
         
        //     return $array;
        // }
         
        // // Call the function
        // $dates = getDatesFromRange($tgl1, $tgl2); 
        
        // dd($dates);
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
        }else{
            $warna = "#FF4500";
        }
        $aula = $request->room_id;
        $rentals = Rental::where('room_id', $aula)->get();

        if ($rentals == "[]") {

            if ($request->time_id == '4') {

                $destination = "surat";
                $foto = $request->file('surat');
                $extension = $foto->getClientOriginalExtension(); 
                // RENAME THE UPLOAD WITH RANDOM NUMBER 
                $suratName = rand(11111, 33333) . '.' . $extension; 
                // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                $foto->move($destination, $suratName);

                $tgl1 = $request->tgl_awal;//pendefinisian tanggal
                $tgl2 = date('Y-m-d', strtotime('+1 days', strtotime($tgl1)));

                // Declare an empty array 
                $array = array(); 
                
                // Use strtotime function 
                $Variable1 = strtotime($tgl1); 
                $Variable2 = strtotime($tgl2); 
                
                // Use for loop to store dates into array 
                // 86400 sec = 24 hrs = 60*60*24 = 1 day 
                for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
                                                    
                    $Store = date('Y-m-d', $currentDate); 
                    
                    $rental = New Rental;
                    $rental->staff_id = $request->staff_id;
                    $rental->room_id = $request->room_id;
                    $rental->peminjam = $request->peminjam;
                    $rental->prodi_id = $request->prodi_id;
                    $rental->no_hp = $request->no_hp;
                    $rental->alamat = $request->alamat;
                    $rental->acara = $request->acara;
                    $rental->tgl_awal = $Store;
                    $rental->tgl_akhir = $Store;
                    $rental->time_id = "3";
                    $rental->surat = $suratName;
                    $rental->color = $warna;
                    $rental->status_id = "2";
                    $rental->pember_izin = "belum";
                    $rental->save();
                }

                return redirect()->route('frontend.schedule')->with('success', 'Input success, dalam waktu 24jam surat anda akan kami cek');
            }elseif($request->time_id == '5') {

                $destination = "surat";
                $foto = $request->file('surat');
                $extension = $foto->getClientOriginalExtension(); 
                // RENAME THE UPLOAD WITH RANDOM NUMBER 
                $suratName = rand(11111, 33333) . '.' . $extension; 
                // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                $foto->move($destination, $suratName);

                $tgl1 = $request->tgl_awal;//pendefinisian tanggal
                $tgl2 = date('Y-m-d', strtotime('+2 days', strtotime($tgl1)));

                // Declare an empty array 
                $array = array(); 
                
                // Use strtotime function 
                $Variable1 = strtotime($tgl1); 
                $Variable2 = strtotime($tgl2); 
                
                // Use for loop to store dates into array 
                // 86400 sec = 24 hrs = 60*60*24 = 1 day 
                for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
                                                    
                    $Store = date('Y-m-d', $currentDate); 
                    
                    $rental = New Rental;
                    $rental->staff_id = $request->staff_id;
                    $rental->room_id = $request->room_id;
                    $rental->peminjam = $request->peminjam;
                    $rental->prodi_id = $request->prodi_id;
                    $rental->no_hp = $request->no_hp;
                    $rental->alamat = $request->alamat;
                    $rental->acara = $request->acara;
                    $rental->tgl_awal = $Store;
                    $rental->tgl_akhir = $Store;
                    $rental->time_id = "3";
                    $rental->surat = $suratName;
                    $rental->color = $warna;
                    $rental->status_id = "2";
                    $rental->pember_izin = "belum";
                    $rental->save();
                }

                return redirect()->route('frontend.schedule')->with('success', 'Input success, dalam waktu 24jam surat anda akan kami cek');
            }else {

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
                $rental->status_id = "2";
                $rental->pember_izin = "belum";
                $rental->save();

                return redirect()->route('frontend.schedule')->with('success', 'Input success, dalam waktu 24jam surat anda akan kami cek');
            }
            

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
                        $rental->status_id = "2";
                        $rental->pember_izin = "belum";
                        $rental->save();
    
                        return redirect()->route('frontend.schedule')->with('success', 'Input success, dalam waktu 24jam surat anda akan kami cek');
                    }
                }
                
            }else{

                if($request->time_id == '4') {

                    $tgl1 = $request->tgl_awal;//pendefinisian tanggal
                    $tgl2 = date('Y-m-d', strtotime('+1 days', strtotime($tgl1)));

                    // Declare an empty array 
                    $array = array(); 
                    
                    // Use strtotime function 
                    $Variable1 = strtotime($tgl1); 
                    $Variable2 = strtotime($tgl2); 
                    
                    // Use for loop to store dates into array 
                    // 86400 sec = 24 hrs = 60*60*24 = 1 day 
                    for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
                                                        
                        $Store = date('Y-m-d', $currentDate); 
                        $array[] = $Store;
                    }
                    if (in_array($array[1],$tgls)) {
                        return back()->withInput()->with('error', 'Input Invalid, Aula yang anda pilih sudah terpinjam pada waktu tersebut');
                    }else {

                        $destination = "surat";
                        $foto = $request->file('surat');
                        $extension = $foto->getClientOriginalExtension(); 
                        // RENAME THE UPLOAD WITH RANDOM NUMBER 
                        $suratName = rand(11111, 33333) . '.' . $extension; 
                        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                        $foto->move($destination, $suratName);

                        // Use for loop to store dates into array 
                        // 86400 sec = 24 hrs = 60*60*24 = 1 day 
                        for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
                                                            
                            $Store = date('Y-m-d', $currentDate); 
                            $rental = New Rental;
                            $rental->staff_id = $request->staff_id;
                            $rental->room_id = $request->room_id;
                            $rental->peminjam = $request->peminjam;
                            $rental->prodi_id = $request->prodi_id;
                            $rental->no_hp = $request->no_hp;
                            $rental->alamat = $request->alamat;
                            $rental->acara = $request->acara;
                            $rental->tgl_awal = $Store;
                            $rental->tgl_akhir = $Store;
                            $rental->time_id = "3";
                            $rental->surat = $suratName;
                            $rental->color = $warna;
                            $rental->status_id = "2";
                            $rental->pember_izin = "belum";
                            $rental->save();
                        }
        
                        return redirect()->route('frontend.schedule')->with('success', 'Input success, dalam waktu 24jam surat anda akan kami cek');
                    }
                }elseif($request->time_id == '5') {

                    $tgl1 = $request->tgl_awal;//pendefinisian tanggal
                    $tgl2 = date('Y-m-d', strtotime('+2 days', strtotime($tgl1)));

                    // Declare an empty array 
                    $array = array(); 
                    
                    // Use strtotime function 
                    $Variable1 = strtotime($tgl1); 
                    $Variable2 = strtotime($tgl2); 
                    
                    // Use for loop to store dates into array 
                    // 86400 sec = 24 hrs = 60*60*24 = 1 day 
                    for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
                                                        
                        $Store = date('Y-m-d', $currentDate); 
                        $array[] = $Store;
                    }
                    if (in_array($array[1],$tgls)) {
                        return back()->withInput()->with('error', 'Input Invalid, Aula yang anda pilih sudah terpinjam pada waktu tersebut');
                    }elseif(in_array($array[2],$tgls)) {
                        return back()->withInput()->with('error', 'Input Invalid, Aula yang anda pilih sudah terpinjam pada waktu tersebut');
                    }else{

                        $destination = "surat";
                        $foto = $request->file('surat');
                        $extension = $foto->getClientOriginalExtension(); 
                        // RENAME THE UPLOAD WITH RANDOM NUMBER 
                        $suratName = rand(11111, 33333) . '.' . $extension; 
                        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                        $foto->move($destination, $suratName);

                        // Use for loop to store dates into array 
                        // 86400 sec = 24 hrs = 60*60*24 = 1 day 
                        for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
                                                            
                            $Store = date('Y-m-d', $currentDate); 
                            $rental = New Rental;
                            $rental->staff_id = $request->staff_id;
                            $rental->room_id = $request->room_id;
                            $rental->peminjam = $request->peminjam;
                            $rental->prodi_id = $request->prodi_id;
                            $rental->no_hp = $request->no_hp;
                            $rental->alamat = $request->alamat;
                            $rental->acara = $request->acara;
                            $rental->tgl_awal = $Store;
                            $rental->tgl_akhir = $Store;
                            $rental->time_id = "3";
                            $rental->surat = $suratName;
                            $rental->color = $warna;
                            $rental->status_id = "2";
                            $rental->pember_izin = "belum";
                            $rental->save();
                        }
                        
                        return redirect()->route('frontend.schedule')->with('success', 'Input success, dalam waktu 24jam surat anda akan kami cek');
                    }
                }else {

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
                    $rental->status_id = "2";
                    $rental->pember_izin = "belum";
                    $rental->save();

                    return redirect()->route('frontend.schedule')->with('success', 'Input success, dalam waktu 24jam surat anda akan kami cek');
                }
                
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
