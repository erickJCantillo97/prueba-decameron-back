<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    /** @use HasFactory<\Database\Factories\HotelFactory> */
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    public function rooms()
    {
        return $this->hasMany(HotelRoomsAccommodation::class);
    }
}
