<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory, HasUuids;

    protected $table= 'tags';
    protected $primayKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable=['title'];
    protected $guarded=['id'];

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
