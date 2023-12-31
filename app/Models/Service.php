<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $guarded = ['id'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function review(){
        return $this->hasMany(Review::class);
    }

    public function avg_rating()
    {
        return $this->review()->avg('rating');
    }

}
