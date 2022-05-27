<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeData extends Model
{
    use HasFactory;
  protected  $fillable = ['challenge_id','Formal','Unformal','Symbolic','Text','Geometreic','Free','Classic','Modern','Luxury','Economy'];

  public function challenge()
  {
      return $this->belongsTo(Challenge::class,'challenge_id');
  }
}