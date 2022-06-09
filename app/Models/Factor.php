<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    protected $fillable = [
        'title', 'description', 'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function drivers()
    {
        return $this->belongsToMany(Driver::class);
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function images()
    {
        return $this->hasMany(FactorImage::class);
    }
}
