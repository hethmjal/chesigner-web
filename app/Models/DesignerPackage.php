<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesignerPackage extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['packages_id','designer_id','type'];
    public function subscription()
    {
        return $this->belongsTo(Subscriptions::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'designer_id');
    }

    public function package()
    {
        return $this->belongsTo(Packages::class,'packages_id');
    }

    public function requests()
    {
        return $this->hasMany(PackagesOrder::class,'designer_package_id');
    }
   
    
}