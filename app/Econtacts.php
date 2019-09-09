<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Econtacts extends Model
{
    protected $guarded = [];

    public function persons()
    {
        return $this->belongsTo(Persons::class);
    }
}
