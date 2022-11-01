<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function roles()
    {
        /* Laravel automatically following this naming convension to pick value from database
        |   this naming convention is just use if our table name is diffrent from this naming convention
        |
        |    return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
        |    
        |
        */

        return $this->belongsToMany(Role::class)->withPivot('created_at', 'updated_at');
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class);
    }

    public function photos()
    {
        // return $this->morphMany(Photo::class, 'imageable');
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
        
    }

    // public function setNameAttribute($value)
    // {
    //     $this->attributes['name'] = strtoupper($value);
    //     return ucwords($value);
        
    // }
}
