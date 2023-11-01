<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    const STATUS_OK = 1;
    const STATUS_ABSENT = 1;
    const STATUS_DELAYED = 1;
    const STATUS_WAITING = 1;
}
