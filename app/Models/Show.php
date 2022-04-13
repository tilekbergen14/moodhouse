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
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function episodes()
    {
        $episodes = $this->hasMany(Episode::class);
        return $episodes;
    }
}
