<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Method extends Model
{
    const ID_SUM = 1;
    const ID_DOMINANT = 2;

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
