<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
Use Exception;

class Article extends Model
{
    protected $guarded = [];

    protected $dates = ['published_at'];

    protected $appends = ['header'];

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment(object $data)
    {
        try {
            return $this->comments()->create([
                'subject' => $data->subject,
                'body' => $data->body
            ]);
        } catch (Exception $e) {

        }
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
