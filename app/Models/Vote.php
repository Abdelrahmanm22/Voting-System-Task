<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = ['voter_id', 'candidate_id'];

    /**
    We may use the polymorphic relationship allows flexibility if you want to extend voting to other entities in the future (e.g., Post, Comment, or another model).
    but Slightly more complex to set up and query due to the type columns, (((especially if you’re only dealing with User for now))),
    and polymorphic relationships require resolving the type column, which can be marginally slower than direct foreign keys.
     */
    public function candidate(){
        return $this->belongsTo(User::class, 'candidate_id');
    }
    public function voter()
    {
        return $this->belongsTo(User::class, 'voter_id');
    }
}
