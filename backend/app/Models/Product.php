<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $category_id;
    protected $guarded = ['id'];
    protected $fillable = ['name', 'description', 'price', 'image'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


}
