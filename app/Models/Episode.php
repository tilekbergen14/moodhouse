<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $fillable = [
        'episode',
        'video',
        'show_id'
    ];
    public function parent(){
        $show = Show::find($this->show_id);
        return $show;
    }
}
