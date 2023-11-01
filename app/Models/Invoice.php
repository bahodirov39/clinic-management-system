<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    const STATUS_PAID = 1;
    const STATUS_NOT_PAID = 2;
    const STATUS_WAITING = 3;
}
