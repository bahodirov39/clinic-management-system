<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;

    protected $guarded = [];

    const STATUS_DONE = 1;
    const STATUS_DENIED = 2;
    const STATUS_DELAYED = 3;
}
