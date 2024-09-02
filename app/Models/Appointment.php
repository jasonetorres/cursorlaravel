<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['user_id', 'client_name', 'client_email', 'start_time', 'end_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}