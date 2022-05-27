<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = ['from','to','title','type','message','order_id','challenge_id',];
    public function form()
    {
        return $this->belongsTo(User::class,'from');
    }
   
    public function to()
    {
        return $this->belongsTo(User::class,'to');
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class,'order_id');
    } 
    
    public function challenge()
    {
        return $this->belongsTo(Challenge::class,'challenge_id');
    }

}