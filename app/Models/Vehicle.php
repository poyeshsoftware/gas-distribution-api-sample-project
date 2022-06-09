<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'id', 'name'
    ];

    public function factors()
    {
        return $this->belongsToMany(Factor::class);
    }
}
