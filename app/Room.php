<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rental;
use App\Staff;

class Room extends Model
{
    
    protected $fillable = ['nama_ruangan', 'ukuran_benner', 'max', 'gambar', 'staff_id', 'vasilitas', 'pembimbing'];

    public function rental()
    {
        return $this->hasMany(Rental::class); 
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
