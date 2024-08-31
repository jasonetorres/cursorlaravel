<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['time_slot_id', 'booker_name', 'booker_email'];

    public function timeSlot()
    {
        return $this->belongsTo(TimeSlot::class);
    }
}