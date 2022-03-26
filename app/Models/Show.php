<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'released_year',
        'genres',
        'country',
        'type',
        'version',
        'image',
        'status',
    ];
}
