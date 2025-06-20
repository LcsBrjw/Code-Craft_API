<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'content',
        'banner_url',
        'status',
        'tags',
    ];

    protected $attributes = [
        'status' => 'pending',
    ];

    protected static function booted()
{
    static::creating(function ($article) {
        if (empty($article->user_id)) {
            $article->user_id = 1;
        }
    });
}


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
