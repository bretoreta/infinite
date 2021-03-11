<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'user_id',
    ];

    protected $appends = [
        'created',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'liked_tweets')->withTimestamps();
    }

    public function media():MorphMany
    {
        return $this->morphMany(Media::class, 'model');
    }

    public function getCreatedAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
