<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteDesigner extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','designer_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function designer()
    {
        return $this->belongsTo(User::class,'designer_id');
    }
}