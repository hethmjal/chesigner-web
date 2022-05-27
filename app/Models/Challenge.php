<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Challenge extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','audio_file','video','expir_date','title','status','expert','professional','ordinary','description','challenge_type','design_type','image','start','deadline','remainderofexpert','remainderofprofessional','remainderofordinary'];

  public function user()
  {
      return $this->belongsTo(User::class,'user_id');
  }
  
  public function works()
  {
      return $this->hasMany(ChallengeWork::class,'challenge_id');
  }
  

  public function designer_work($id)
  {
      $work = ChallengeWork::where('challenge_id',$id)->where('designer_id',Auth::id())->first();
      return $work;
  }

  public function getDeadlineDateAttribute()
  {
      return Carbon::parse($this->deadline)->format('Y-m-d\TH:i');
  }

  public function getStartDateAttribute()
  {
      return Carbon::parse($this->start)->format('Y-m-d\TH:i');
  }

  public function comments()
  {
      return $this->hasMany(Comment::class,'challenge_id')->latest();
  }
 

  public function likes()
    {
        return $this->hasMany(Like::class,'challenge_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class,'challenge_id');
    }

    public function data()
  {
      return $this->hasOne(ChallengeData::class,'challenge_id','id');
  }
  
  public function orders()
  {
      return $this->hasMany(ChallengesOrder::class,'challenge_id');
  }

  public function designer_order($id)
  {
      $order = ChallengesOrder::where('challenge_id',$id)->where('designer_id',Auth::id())->first();
      return $order;
  }
}