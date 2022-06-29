<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use EloquentFilter\Filterable;

class Product extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = ['name', 'price', 'active'];

    protected $dates = ['deleted_at'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
