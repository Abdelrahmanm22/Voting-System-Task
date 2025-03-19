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
        'photo',
        'status',
        'role'
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
        'password' => 'hashed',
    ];

    //We may use the polymorphic relationship allows flexibility if you want to extend voting to other entities in the future (e.g., Post, Comment, or another model).
    //but Slightly more complex to set up and query due to the type columns, (((especially if you’re only dealing with User for now))),
    //and polymorphic relationships require resolving the type column, which can be marginally slower than direct foreign keys.
    public function votesReceived()
    {
        return $this->hasMany(Vote::class, 'candidate_id');
    }
    public function votesGiven()
    {
        return $this->hasMany(Vote::class, 'voter_id');
    }
}
