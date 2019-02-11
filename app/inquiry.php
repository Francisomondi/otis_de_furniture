<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inquiry extends Model
{
    protected $fillable = [
        'fullname', 
        'email',
        'phone',
        'inquiry'
    ];
}
