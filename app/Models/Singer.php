<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
