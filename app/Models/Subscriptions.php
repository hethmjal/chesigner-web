<?php

namespace App\Models;

use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;

class Subscriptions extends Model
{
    use HasFactory;
    
    protected $fillable =[
        'package_id','user_id','designer_id','done','left'
    ];
    
    protected $casts = [
        'works' => 'array'
    ];
    public function designer_package()
    {
        return $this->hasOne(DesignerPackage::class);
    }
    
    public function designer()
    {
        return $this->belongsTo(User::class,'designer_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

      
    public function package()
    {
        return $this->belongsTo(Packages::class);
    }
   public function work()
   {
       return $this->hasMany(SubWorks::class,'subscriptions_id');
   }

   public function orders()
   {
       return $this->hasMany(SubOrder::class,'subscriptions_id');
   }



}