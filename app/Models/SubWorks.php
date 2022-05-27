<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubWorks extends Model
{
    use HasFactory;
protected $fillable = [
    'subscriptions_id','image','file','numberOfWorks','user_note'
];
    public function subscription()
    {
        return $this->belongsTo(Subscriptions::class,'subscriptions_id');
    }
}