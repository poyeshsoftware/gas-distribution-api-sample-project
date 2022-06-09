<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id', 'name'
    ];


    public function factors()
    {
        return $this->belongsToMany(Factor::class);
//        return $this->belongsToMany(Factor::class)->withTimestamps();
//        return $this->belongsToMany(Factor::class)->withPivot('pivot_name'); // specifying a pivot with name
    }
}
