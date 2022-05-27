<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Order;
use App\Models\SubOrder;
use App\Models\Subscriptions;
use App\Models\User;
use App\Notifications\OrderNotification;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubOrdersUserController extends Controller
{
    public function add($id)
    {
        $sub = Subscriptions::with('package')->findOrFail($id);
        if ($sub->package->number_of_works == $sub->done){
            return redirect()->back();
    }
        return view('userPanel.subscriptionPanel.orderNew',['sub'=>$sub]);
    
    }

    public function store(Request $request,$id)
    {
        $request->validate([
            'image'=>'required|file',
            'title'=>'required',
            'type'=>'required',
            'description'=>'required',
            'deadline'=>'required|date|after:tomorrow'
        ]);

        
        $sub = Subscriptions::with(['designer','user'])->findOrFail($id);

        $designer = User::findOrFail($sub->designer->id);

            $data = $request->all();
            $data['designer_id'] = $sub->designer->id;
            $data['user_id'] = $sub->user_id;
            $data['subscriptions_id'] = $sub->id;

            if ($request->hasFile('image')) {

                $filenameWithExt = $request->file('image')->getClientOriginalName ();
                $fileNameToStore = time(). '_'. $filenameWithExt;
                
                   $file = $request->file('image');
                   $image=$file->storeAs('/images',$fileNameToStore,[
                       'disk'=>'uploads'
                   ]);                 
                   $data['image'] = $image;
                   $data['title']=$request->title;
                   $data['type']=$request->type;
                   $data['description']=$request->description;
                   $data['deadline']=$request->deadline;
                   $data['work_submitted']='working on';

                   
                  
                }
                $order = SubOrder::create($data);
                
                  
                  $message = [
                    'title'=>'you have a new order',
                    'body'=> 'Client '.Auth::user()->name.' invited you to do a design in subscribtion '.$sub->id,
                    'action'=>'/panels/DesignerPanel/MyClients/'.$sub->id,
                    'status'=>'new order',
                    'created_at'=> $order->created_at->diffForHumans(),
                    'order_id'=>$order->id,
                ];
                   $designer->notify(new OrderNotification($order,$message));
                   $designer_id = $order->designer_id;
                   $user_id = $order->user_id;
                   $conversation = Conversation::where('type','=','peer')
                   ->whereHas('participants',function ($builder) use ($designer_id,$user_id) {
                       $builder->join('participants as participants2','participants2.conversation_id' ,'=','participants.conversation_id')
                       ->where('participants.user_id','=',$designer_id)
                       ->where('participants2.user_id','=',$user_id);
                   })->first();  
                   if (!$conversation) {
           
                   $conversation = Conversation::create([
                       'user_id'=>$order->user_id,
                       'type'=>'peer'
                   ]);  
                   
                   $conversation->participants()->attach([
                       $order->designer_id,Auth::id()
                     ]);
                     
               }
      
        return redirect()->route('myDesignersOrders',$sub)->with('status','order created success');
    
    }

    public function show($id)
    {
        
            $order = SubOrder::findOrFail($id);
            $designer_id = $order->designer_id;

            $conversation = Conversation::where('type','=','peer')
            ->whereHas('participants',function ($builder) use ($designer_id) {
                $builder->join('participants as participants2','participants2.conversation_id' ,'=','participants.conversation_id')
                ->where('participants.user_id','=',$designer_id)
                ->where('participants2.user_id','=',Auth::id());
            })->first();  
            return view('userPanel.subscriptionPanel.orderShow',['order'=>$order,'conversation'=>$conversation]);

    
    }

    public function edit($id)
    {
        $order = SubOrder::findOrFail($id);
        return view('userPanel.subscriptionPanel.orderEdit',['order'=>$order]);

    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'title'=>'required',
            'type'=>'required',
            'description'=>'required',
            'deadline'=>'required|date|after:tomorrow'
        ]);
        $order = SubOrder::findOrFail($id);
        $order->title = $request->title;
        $order->description= $request->description;
        $order->deadline = $request->deadline; 
        $order->type = $request->type;
            if ($request->hasFile('image')) {
                Storage::disk('uploads')->delete($order->image);

                $filenameWithExt = $request->file('image')->getClientOriginalName ();
                $fileNameToStore = time(). '_'. $filenameWithExt;
                
                   $file = $request->file('image');
                   $image=$file->storeAs('/images',$fileNameToStore,[
                       'disk'=>'uploads'
                   ]);                 
                  $order->image = $image;

                }
                $order->save();
                $sub = Subscriptions::with('designer','user')->findOrFail($order->subscriptions_id);

                return redirect()->route('myDesignersOrders',$sub)->with('status','order updated success');

    }
        public function check_work(Request $request , $id)
        {
            $order = SubOrder::findOrFail($id);
            $order->user_note = $request->user_note;
            $order->work_status = $request->work_status;
            $order->save();
           $user = User::findOrFail($order->user_id);

           
            if ($order->work_status == 'need to edit') {
                $message = [
                    'title'=>"you have a note from ".Auth::user()->name,
                    'body'=> "user". Auth::user()->name." need a edit in order ".$order->title,
                    'action'=>'/panels/UserPanel/Orders',
                    'status'=>'need to edit',
                    'created_at'=> $order->updated_at->diffForHumans(),
                    'order_id'=>$order->id,
                ];
                 
            $user = User::findOrFail($order->designer_id);
            $user->notify(new OrderNotification($order->order,$message));
    
            } 

            
            if($order->work_status == 'Accepted'){
                $message = [
                    'title'=>"Congratulaion work accepted ",
                    'body'=> "user ". Auth::user()->name." accept your work in order ".$order->title,
                    'action'=>'/panels/DesignerPanel/MyClients/'.$order->subscriptions_id,
                    'status'=>'accept',
                    'created_at'=> $order->updated_at->diffForHumans(),
                    'order_id'=>$order->id,
                ];
                 
            $user = User::findOrFail($order->designer_id);
            $order = SubOrder::findOrFail($order->id);
            $order->work_submitted = "submitted";
            $order->save();
            $user->notify(new OrderNotification($order,$message));
    
            }

            $order = SubOrder::findOrFail($id);
                     
            $sub = Subscriptions::with('designer','user')->findOrFail($order->subscriptions_id);

            return redirect()->route('myDesignersOrders',$sub)->with('status','order created success');

        }

    
}