<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $guarded = [];

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
