<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    protected $guarded = [];

    public function persons()
    {
        return $this->belongsTo(Persons::class);
    }
}
