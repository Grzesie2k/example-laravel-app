<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $hidden = ['value'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }


}
