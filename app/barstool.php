<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class barstool extends Model
{
    protected $fillable = [
        'name', 
        'decription',
        'price',
        'details',
        'dimentions',
        'condition',
        'category',
        'image',
        'user_id',
    ];
    public function users(){
        return $this->belongsTo('App\User');
    }
}
