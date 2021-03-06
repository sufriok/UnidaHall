<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Room;
use App\User;
use App\Staff;
use App\Prodi;
use App\Time;
use App\Status;

class Rental extends Model
{
    protected $fillable = 
    [
        'staff_id', 'room_id',
        'peminjam', 'prodi_id', 
        'no_hp', 'alamat', 
        'acara', 'tgl_awal', 
        'tgl_akhir', 'time_id',
        'surat','color', 
        'status_id', 'pember_izin',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
    public function time()
    {
        return $this->belongsTo(Time::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
