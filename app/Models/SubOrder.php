<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubOrder extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'designer_id',
        'subscriptions_id',
        'designer_name',
        'type',
        'title',
        'image',
        'work_image',
        'work_file',
        'work_status',
        'deadline',
        'description',
        'user_note',
        'designer_note',
        'work_submitted',
        'file_name',
        'file_ext'
    ];
    public function getDateAttribute()
    {
        return Carbon::parse($this->deadline)->format('Y-m-d\TH:i');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function designer()
    {
        return $this->belongsTo(User::class,'designer_id');
    }
    public function subscription()
    {
        return $this->belongsTo(Subscriptions::class,'subscriptions_id');
    }

    public function evaluation()
    {
        return $this->hasOne(Evaluation::class,'sub_order_id');
    }
}