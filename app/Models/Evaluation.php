<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','user_id','designer_id','rate','body','challengeWork_id','sub_order_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function designer()
    {
        return $this->belongsTo(User::class,'designer_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    }

    public function challengework()
    {
        return $this->belongsTo(Challenge::class,'challengeWork_id');
    }
    
    public function suborder()
    {
        return $this->belongsTo(SubOrder::class,'sub_order_id');
    }
}