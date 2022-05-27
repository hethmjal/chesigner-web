<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;
    protected $fillable =[
        'name','price','number_of_works','single_work_editing','change_designer','unsubscribe','meeting_schedule','screen_share_technology'
    ];

    public function User()
    {
        return $this->belongsToMany(User::class,'designer_packages','user_id','package_id');
    }
    
    public function designers()
    {
        return $this->hasOne(DesignerPackage::class);
    }
}