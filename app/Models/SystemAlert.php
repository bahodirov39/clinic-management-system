<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemAlert extends Model
{
    use HasFactory;

    protected $guarded = [];

    const SYSALERT_STATUS_ACTIVE = 1;
    const SYSALERT_STATUS_UNACTIVE = 2;

    const SYSALERT_STATUS_FOR_OWNER_ACTIVE = 1;
    const SYSALERT_STATUS_FOR_OWNER_UNACTIVE = 2;

    const SYSALERT_STATUS_FOR_NOT_OWNER_ACTIVE = 1;
    const SYSALERT_STATUS_FOR_NOT_OWNER_UNACTIVE = 2;
}
