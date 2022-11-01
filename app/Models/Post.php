<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Photo;

class Post extends Model
{
    public $directory = "/image/";
    use SoftDeletes;
    protected $date = ['deleted_at'];
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'content', 'path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    // public function scopeLatest($query)
    // {
    //     return $query->orderBy('id', 'desc')->get();
    // }

    public function getPathAttribute($value)
    {
        return $this-> directory . $value;
    }

}
