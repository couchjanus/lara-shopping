<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = ['name','ext','size'];

    public function getSizeAttribute($value)
    {
        return number_format($value / 1024, 1);
    }
}
