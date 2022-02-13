<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title',
        'text',
        'category_id',
    ];

    public static function getNewsByCategoryId(int $id)
    {
        return static::query()
            ->where('category_id', $id)
            ->get();
    }
}