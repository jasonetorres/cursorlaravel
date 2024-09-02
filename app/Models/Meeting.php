<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'availability_block_id', 'meeting_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function availabilityBlock()
    {
        return $this->belongsTo(AvailabilityBlock::class);
    }
}