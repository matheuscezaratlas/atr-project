<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'capacity',
    ];

    public function event()
    {
        return $this->hasMany(Event::class);
    }
}