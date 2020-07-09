<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];
    protected $fillable = ['name', 'description', 'price', 'image', 'category_id'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
