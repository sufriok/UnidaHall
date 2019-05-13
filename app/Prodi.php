<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rental;

class Prodi extends Model
{
    protected $fillable = ['name'];

    public function rental()
    {
        return $this->hasMany(Rental::class); 
    }
}
