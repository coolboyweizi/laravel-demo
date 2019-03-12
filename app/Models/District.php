<?php

namespace App\Models;

use App\Models\Base as Model;

class District extends Model
{
    protected $table = 'districts';
    protected $fillable = ['citycode','adcode','name','center','level'];
}
