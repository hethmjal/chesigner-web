<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagesOrder extends Model
{
    use HasFactory;
    protected $fillable = ['designer_package_id','designer_id','user_id','package_id'];

    public function package()
    {
        return $this->belongsTo(Packages::class,'package_id');
    }

    public function designer()
    {
        return $this->belongsTo(User::class,'designer_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function designer_package()
    {
        return $this->belongsTo(DesignerPackage::class,'designer_package_id');
    }
}