<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'luggage',
        'doors',
        'passengers',
        'price',
        'category_id',
        'published',
        ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
