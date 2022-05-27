<?php

namespace App\Http\Controllers;

use App\Models\DesignerPackage;
use App\Models\Packages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PackagesController extends Controller
{
    public function active($id)
    {
        $packages = Packages::with(['designers'=>function($q) use($id)
        {
            $q->where('designer_id',Auth::id())->where('packages_id',$id);
        }])->findOrFail($id);

      //  dd($packages->designers);
      if($packages->designers){
        DesignerPackage::where('id',$id,)->update([
            'type'=>'active'
       ]);
      }else{
        DesignerPackage::create([
            'packages_id'=>$id,
            'designer_id'=>Auth::id(),
            'type'=>'active'
        ]);
    }
        return redirect()->route('profiledesignerresource.about')->with('success','package active success');
    }

    public function unactive($id)
    {

        DesignerPackage::where('id',$id,)->update([
             'type'=>'unactive'
        ]);
        return redirect()->route('profiledesignerresource.about')->with('success','package un active success');

    }
    
}