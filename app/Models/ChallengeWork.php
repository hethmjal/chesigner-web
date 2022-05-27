<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeWork extends Model
{
    use HasFactory;
    protected $fillable = ['designer_id','image','file','challenge_id','submit_work','rank','note'];

    public function designer()
    {
        return $this->belongsTo(User::class,'designer_id');
    }

    public function challenge()
    {
        return $this->belongsTo(Challenge::class,'challenge_id');
    }

    public function evaluation()
    {
        return $this->hasOne(Evaluation::class,'challengeWork_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class,'work_id');
    }
}