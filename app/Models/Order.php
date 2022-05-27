<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'designer_id',
        'designer_name',
        'type',
        'title',
        'image',
        'status',
        'work_submitted',
        'deadline',
        'description',
    ];
    
    public function getImageOrderAttribute(){
        return asset('uploads/'.$this->image);
    }
    public function getDateAttribute()
    {
        return Carbon::parse($this->deadline)->format('Y-m-d\TH:i');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_work()
    {
        return $this->hasOne(Order_Work::class);
    }

   

    public function evaluation()
    {
        return $this->hasOne(Evaluation::class,'order_id');
    }

    public function reports()
    {
        return $this->hasMany(Report::class,'order_id');
    }
}