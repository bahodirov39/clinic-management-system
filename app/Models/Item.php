<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    const STATUS_ACTIVE = 1;
    const STATUS_UNACTIVE = 2;

    public function category()
    {
        return $this->belongsTo(ItemCategory::class, 'category_id', 'id');
    }

    public function scopeAvailable()
    {
        return $this->where('in_stock', '>', 0);
    }

    public function scopeOrdered()
    {
        return $this->orderBy('in_stock', 'ASC');
    }
}
