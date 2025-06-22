<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'posts';
    protected $primayKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    //
    protected $fillable = ['title', 'body', 'published', 'author']; // Fields that can be updated
    protected $guarded = ['id']; // Cannot be updated/assigned (readonly)

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
