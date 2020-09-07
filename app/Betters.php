<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Betters extends Model
{
    public $fillable = ['name', 'surname', 'bet'];

    public function horses()
    {
        return $this->belongsTo('App\Horses');
    }
}
