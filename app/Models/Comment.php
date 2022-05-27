<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['challenge_id','user_id','body'];
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function challenge()
    {
        return $this->belongsTo(Challenge::class,'challenge_id');
    }

    public function replies()
    {
        return $this->hasMany(ReplyComment::class,'comment_id');
    }

}