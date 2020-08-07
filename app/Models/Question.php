<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

