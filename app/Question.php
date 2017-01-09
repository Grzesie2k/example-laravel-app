<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
