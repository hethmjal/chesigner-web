<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengesOrder extends Model
{
    use HasFactory;
    protected $fillable = ['challenge_id','designer_id'];
    
    public function challenge()
    {
        return $this->belongsTo(Challenge::class,'challenge_id');
    }

    public function designer()
    {
        return $this->belongsTo(User::class,'designer_id');
    }
    
}