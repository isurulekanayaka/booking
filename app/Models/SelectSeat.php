<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SelectSeat extends Model
{
    use HasFactory;
    protected $table = 'select_seats';
    protected $fillable = ['seat_number', 'user_id', 'bus_id', 'date'];

    // Define relationships if any
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
