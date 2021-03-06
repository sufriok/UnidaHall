<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rental;
use App\Room;
use App\Prodi;
use App\Time;
use App\Status;
use Auth;
use App\Exports\RentalsExport;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Facades\Excel;

class RentalController extends Controller
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
            $rentals = Rental::all();
            $admin = "yes";
        }
        else
        {
            $rentals = Rental::where('staff_id', $staff)->get();
            $admin = "no";
        }
        
        return view('backend.rental.index', compact('rentals', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = Auth::user()->staff_id;
        $prodis = Prodi::all();
        $times = Time::all();
        $statuses = Status::all();
        if($staff == '1')
        {
            $rooms = Room::all();
            
        }
        else
        {
            $rooms = Room::where('staff_id', $staff)->get();
        }
        
        return view('backend.rental.create', compact('rooms', 'staff', 'prodis', 'times', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->status_id == "1"){
            if ($request->time_id == "1") {
                $warna = "#7CFC00";
            }elseif ($request->time_id == "2") {
                $warna = "#32CD32";
            }else{
                $warna = "#228B22";
            }
        }elseif($request->status_id == "2"){
            if ($request->time_id == "1") {
                $warna = "#F9A602";
            }elseif ($request->time_id == "2") {
                $warna = "#F9812A";
            }else{
                $warna = "#FF4500";
            }
        }

        $staff = Auth::user()->staff_id;
        $pember_izin = Auth::user()->name;
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
                    $rental->staff_id = $staff;
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
                    $rental->status_id = $request->status_id;
                    $rental->pember_izin = $pember_izin;
                    $rental->save();
                }

                return redirect()->route('rental.index')->with('success', 'Input success');
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
                    $rental->staff_id = $staff;
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
                    $rental->status_id = $request->status_id;
                    $rental->pember_izin = $pember_izin;
                    $rental->save();
                }

                return redirect()->route('rental.index')->with('success', 'Input success');
            }else {

                $destination = "surat";
                $foto = $request->file('surat');
                $extension = $foto->getClientOriginalExtension(); 
                // RENAME THE UPLOAD WITH RANDOM NUMBER 
                $suratName = rand(11111, 33333) . '.' . $extension; 
                // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                $foto->move($destination, $suratName);
                
                $rental = New Rental;
                $rental->staff_id = $staff;
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
                $rental->status_id = $request->status_id;
                $rental->pember_izin = $pember_izin;
                $rental->save();

                return redirect()->route('rental.index')->with('success', 'Input success');
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
                        $rental->staff_id = $staff;
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
                        $rental->status_id = $request->status_id;
                        $rental->pember_izin = $pember_izin;
                        $rental->save();
    
                        return redirect()->route('rental.index')->with('success', 'Input success');
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

                        for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
                                                    
                            $Store = date('Y-m-d', $currentDate); 
                            $rental = New Rental;
                            $rental->staff_id = $staff;
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
                            $rental->status_id = $request->status_id;
                            $rental->pember_izin = $pember_izin;
                            $rental->save();
                        }
                        
                        return redirect()->route('rental.index')->with('success', 'Input success');
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

                        for ($currentDate = $Variable1; $currentDate <= $Variable2; $currentDate += (86400)) { 
                                                    
                            $Store = date('Y-m-d', $currentDate); 
                            $rental = New Rental;
                            $rental->staff_id = $staff;
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
                            $rental->status_id = $request->status_id;
                            $rental->pember_izin = $pember_izin;
                            $rental->save();
                        }
                        
                        return redirect()->route('rental.index')->with('success', 'Input success');
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
                    $rental->staff_id = $staff;
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
                    $rental->status_id = $request->status_id;
                    $rental->pember_izin = $pember_izin;
                    $rental->save();

                    return redirect()->route('rental.index')->with('success', 'Input success');
                }
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rental = Rental::find($id);
        return view('backend.rental.show', compact('rental', 'rooms'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rental = Rental::find($id);
        $staff = Auth::user()->staff_id;
        $prodis = Prodi::all();
        $statuses = Status::all();
        $times = Time::where('id', '<=', 3)->get();
        if($staff == '1')
        {
            $rooms = Room::all();
            
        }
        else
        {
            $rooms = Room::where('staff_id', $staff)->get();
        }
        
        return view('backend.rental.edit', compact('rental', 'rooms', 'prodis', 'times', 'statuses'));
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
        
        if($request->status_id == "1"){
            if ($request->time_id == "1") {
                $warna = "#7CFC00";
            }elseif ($request->time_id == "2") {
                $warna = "#32CD32";
            }else{
                $warna = "#228B22";
            }
        }elseif($request->status_id == "2"){
            if ($request->time_id == "1") {
                $warna = "#F9A602";
            }elseif ($request->time_id == "2") {
                $warna = "#F9812A";
            }else{
                $warna = "#FF4500";
            }
        }

        $destination = "surat";
        $pember_izin = Auth::user()->name;
        $aula = $request->room_id;
        $rentals = Rental::where('room_id', $aula)->get();
        $rental = Rental::find($id);

        if($rental->tgl_awal == $request->tgl_awal){

            if ($rental->time_id == $request->time_id) {
                if($request->hasFile('surat')){
                    $foto = $request->file('surat');
                    $extension = $foto->getClientOriginalExtension(); 
                    // RENAME THE UPLOAD WITH RANDOM NUMBER 
                    $suratName = rand(11111, 33333) . '.' . $extension; 
                    // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                    $foto->move($destination, $suratName);
                }else{
                    $suratName = $rental->surat;
                }
                
                $rental->room_id = $request->room_id;
                $rental->peminjam = $request->peminjam;
                $rental->prodi_id = $request->prodi_id; 
                $rental->no_hp = $request->no_hp;
                $rental->alamat = $request->alamat;
                $rental->acara = $request->acara;
                $rental->surat = $suratName;
                $rental->color = $warna;
                $rental->status_id = $request->status_id;
                $rental->pember_izin = $pember_izin;
                $rental->push();

                return redirect()->route('rental.index')->with('success', 'Update success');
            }else{

                $tanggal = $request->tgl_awal;
                $rntls = Rental::where('tgl_awal', $tanggal)->where('room_id', $aula)->get();
                
                foreach ($rntls as $rntl)
                {
                    $time[] = $rntl->time_id;
                    $times = array_values($time);
                }
                    
                if (in_array($request->time_id,$times)){
                    return back()->with('error', 'Input Invalid, Aula yang anda pilih sudah terpinjam pada waktu tersebut');
                } else {
                    
                    if($request->hasFile('surat')){
                        $foto = $request->file('surat');
                        $extension = $foto->getClientOriginalExtension(); 
                        // RENAME THE UPLOAD WITH RANDOM NUMBER 
                        $suratName = rand(11111, 33333) . '.' . $extension; 
                        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                        $foto->move($destination, $suratName);
                    }else{
                        $suratName = $rental->surat;
                    }
                    
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
                    $rental->status_id = $request->status_id;
                    $rental->pember_izin = $pember_izin;
                    $rental->push();

                    return redirect()->route('rental.index')->with('success', 'Update success');
                }
                
            }
             

        }else{

            if ($rentals == "[]") {

                if($request->hasFile('surat')){
                    $foto = $request->file('surat');
                    $extension = $foto->getClientOriginalExtension(); 
                    // RENAME THE UPLOAD WITH RANDOM NUMBER 
                    $suratName = rand(11111, 33333) . '.' . $extension; 
                    // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                    $foto->move($destination, $suratName);
                }else{
                    $suratName = $rental->surat;
                }
                
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
                $rental->status_id = $request->status_id;
                $rental->pember_izin = $pember_izin;
                $rental->push();

                return redirect()->route('rental.index')->with('success', 'Update success');
    
            }else {
                foreach ($rentals as $rentalo)
                    {
                        $tgl[] = $rentalo->tgl_awal;
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
                        return back()->with('error', 'Input Invalid, Aula yang anda pilih sudah terpinjam pada waktu tersebut');
                    }elseif(in_array($seharian,$times)){
                        return back()->with('error', 'Input Invalid, Aula yang anda pilih sudah terpinjam pada waktu tersebut');
                    }else{
                        
                        if (in_array($request->time_id,$times)){
                            return back()->with('error', 'Input Invalid, Aula yang anda pilih sudah terpinjam pada waktu tersebut');
                        } else {
                            
                            if($request->hasFile('surat')){
                                $foto = $request->file('surat');
                                $extension = $foto->getClientOriginalExtension(); 
                                // RENAME THE UPLOAD WITH RANDOM NUMBER 
                                $suratName = rand(11111, 33333) . '.' . $extension; 
                                // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                                $foto->move($destination, $suratName);
                            }else{
                                $suratName = $rental->surat;
                            }
                            
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
                            $rental->status_id = $request->status_id;
                            $rental->pember_izin = $pember_izin;
                            $rental->push();
        
                            return redirect()->route('rental.index')->with('success', 'Update success');
                        }
                    }
                }else{
    
                    if($request->hasFile('surat')){
                        $foto = $request->file('surat');
                        $extension = $foto->getClientOriginalExtension(); 
                        // RENAME THE UPLOAD WITH RANDOM NUMBER 
                        $suratName = rand(11111, 33333) . '.' . $extension; 
                        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY 
                        $foto->move($destination, $suratName);
                    }else{
                        $suratName = $rental->surat;
                    }
            
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
                    $rental->status_id = $request->status_id;
                    $rental->pember_izin = $pember_izin;
                    $rental->push();
            
                    return redirect()->route('rental.index')->with('success', 'Update success');
                    
                }
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rental = Rental::find($id);
        $rental->delete();

        return redirect()->route('rental.index');
    }

    public function checklist($id)
    {
        
        $pember_izin = Auth::user()->name;
        $rental = Rental::find($id);
        if ($rental->time_id == "1") {
            
            $rental->color = "#7CFC00";
            $rental->status_id = "1";
            $rental->pember_izin = $pember_izin;
            $rental->push();
        }elseif ($rental->time_id == "2") {
            
            $rental->color = "#32CD32";
            $rental->status_id = "1";
            $rental->pember_izin = $pember_izin;
            $rental->push();
        }else{
            
            $rental->color = "#228B22";
            $rental->status_id = "1";
            $rental->pember_izin = $pember_izin;
            $rental->push();
        }

        return redirect()->route('rental.index');
    }

    public function export()
    {
        return Excel::download(new RentalsExport, 'peminjaman.xlsx');
    }
}
