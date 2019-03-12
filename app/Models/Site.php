<?php

namespace App\Models;


use App\Models\Base as Model;

class Site extends Model
{
    protected $table = 'sites';
    protected $guarded = ['id'];
}
