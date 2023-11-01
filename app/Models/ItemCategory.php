<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;

    protected $table = 'item_categories';

    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id', 'id');
    }

    public function getItemCountAttribute()
    {
        $categoryIds = $this->category_id ? json_decode($this->category_id, true) : null;
        if ($categoryIds) {
            return Item::whereIn('category_id', $categoryIds)->count();
        }
        return 0;
    }

    public function scopeOrderDesc()
    {
        return $this->orderBy('id', 'DESC');
    }

    public function scopeActive()
    {
        return $this->where('status', 1);
    }
}
