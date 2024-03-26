<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone_number', 'age', 'club', 'parent_phone_number', 'height', 'address'];
    public function scopeFilterByAttribute($query, $attribute, $value)
    {
        return $query->where($attribute, 'LIKE', "%$value%");
    }
}
