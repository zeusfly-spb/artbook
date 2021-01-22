<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];

    protected $appends = ['url'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function getUrlAttribute()
    {
        return url('/articles/' . $this->article->slug);
    }
}
