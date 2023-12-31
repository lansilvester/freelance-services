<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = ['id'];
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }
    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }
    public function countServices()
    {
        return $this->hasMany(Service::class, 'category_id')->count();
    }
}
