<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Staff;

class Message extends Model
{
    protected $fillable = ['name', 'email', 'staff_id', 'subject', 'pesan'];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
