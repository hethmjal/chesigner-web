<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Work extends Model
{
    use HasFactory;
    protected $fillable = [
        'designer_id',
        'user_id',
        'order_id',
        'file',
        'file_name',
        'file_ext',
        'image',
        'status',
        'designer_note',
        'user_note'
    ];    
    public function order()
    {
        return $this->belongsTo(Order::class);
        
    }
    public function getImageOrderAttribute(){
        return asset('uploads/'.$this->image);
    }
    public function getFileOrderAttribute(){
        return asset('uploads/'.$this->file);
    }

   
}