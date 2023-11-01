<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    const STATUS_COLD = 1;
    const STATUS_WARM = 2;
    const STATUS_HOT = 3;
}
