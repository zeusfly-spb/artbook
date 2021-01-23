<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $guarded = [];

    protected $dates = ['published_at'];

    protected $appends = ['header'];

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function getHeaderAttribute()
    {
        return explode('.', $this->text)[0];
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($article) {
            $article->slug = Str::random(10);
        });
    }
}
