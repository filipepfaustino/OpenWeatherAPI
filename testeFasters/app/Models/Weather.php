<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $table = "weathers";
    protected $fillable = ['city_name', 'temp', 'feels_like', 'temp_min', 'temp_max'];
}
