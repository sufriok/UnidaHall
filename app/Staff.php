<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Room;
use App\Rental;
use App\Message;

class Staff extends Model
{
    protected $fillable = ['name'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function room()
    {
        return $this->hasMany(Room::class);
    }
    public function rental()
    {
        return $this->hasMany(Rental::class);
    }
    public function message()
    {
        return $this->hasMany(Message::class);
    }
}
