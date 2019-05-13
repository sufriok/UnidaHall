<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rental;

class Time extends Model
{
    protected $fillable = ['waktu'];

    public function rental()
    {
        return $this->hasMany(Rental::class); 
    }
}
