<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class answers extends Model
{
    public function user() {
        return $this->belongsTo(Question::class);
    }
}
