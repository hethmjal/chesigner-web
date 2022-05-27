<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Work;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderNotification;
use Symfony\Component\VarDumper\Cloner\Data;

class OrderWorkController extends Controller
{

    
    
    public function store(Request $request,$id)
    {
       // dd($request->all());
         $request->validate([
            'image'=>'required',
            'file'=>'required',
        ]);
        $work = Order_Work::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('image')) {
           
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $fileNameToStore = time(). '_'. $filenameWithExt;
            
               $file = $request->file('image');
               $image=$file->storeAs('/images',$fileNameToStore,[
                   'disk'=>'uploads'
               ]);                 
              $data['image'] = $image;

            }
            if ($request->hasFile('file')) {
           
                $filenameWithExt = $request->file('file')->getClientOriginalName ();
                $fileNameToStore = time(). '_'. $filenameWithExt;
                
                   $file = $request->file('file');
                   $file=$file->storeAs('/files',$fileNameToStore,[
                       'disk'=>'uploads'
                   ]);            
                   $data['file_name'] = $request->file('file')->getClientOriginalName();
                   $data['file_ext'] = $request->file('file')->extension();;
     
                   $data['file'] = $file;

                }
                $data['status']='under review';
                $work->update($data);
                $message = [
                    'title'=>'work added',
                    'body'=> 'Designer '.Auth::user()->name.' add a work '.$work->order->title,
                    'action'=>'/panels/UserPanel/Orders',
                    'status'=>'accept',
                    'created_at'=> $work->updated_at->diffForHumans(),
                    'order_id'=>$work->id,
                ];
                
                $user = User::findOrFail($work->order->user_id);
                   $user->notify(new OrderNotification($work->order,$message));
        return redirect()->route('order.myorder')->with("success","work added success");

    }
}