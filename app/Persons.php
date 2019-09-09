<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persons extends Model
{
    protected $guarded = [];

    public function addresses()
    {
        return $this->hasMany(Addresses::class);
    }

    public function econtacts()
    {
        return $this->hasMany(Econtacts::class);
    }
}
