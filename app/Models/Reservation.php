<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    use HasUuids;

    public $fillable = [
        //'reservation_id',
        'facility_iD',
        'user_id',
        'reservation_datetime',
        //'start_datetime',
        //'end_datetaime',
    ];
}
