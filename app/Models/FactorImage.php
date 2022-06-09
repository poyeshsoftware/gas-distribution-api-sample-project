<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FactorImage extends Model
{
    protected $fillable = [
        'name',
    ];

    public function factor()
    {
        return $this->belongsTo(FactorImage::class);
    }
}
