<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $guarded = [];

    protected $dates = ['published_at'];

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($article) {
            $article->slug = Str::random(10);
        });
    }
}
