<?php

namespace App\Http\Controllers;

use App\Models\ChallengeWork;
use App\Models\Evaluation;
use App\Models\Order;
use App\Models\SubOrder;
use App\Models\Subscriptions;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

class EvaluationController extends Controller
{
    public function order_create(Request $request,$id)
    {
         $order = Order::findOrFail($id);
        $designer = User::findOrFail($order->designer_id);
        
        $data =[];
        $data['user_id']= Auth::id();
        $data['designer_id'] = $designer->id;
        $data['order_id'] = $order->id;
        $data['rate'] = $request->stars;
        $data['body'] = $request->body;

        Evaluation::create($data);
        $message = [
            'title'=>'you have a new reviews',
            'body'=> 'Client '.Auth::user()->name.' add a review in order '.$order->id,
            'action'=>'/panels/DesignerPanel/Orders/MyOrders',
            'status'=>'new order',
            'created_at'=> $order->created_at->diffForHumans(),
            'order_id'=>$order->id,
        ];
           $designer->notify(new OrderNotification($order,$message));

           return redirect()->route('user.order.index')->with("success","order reviews success");

    }

    public function challenge_create(Request $request,$id)
    {
       // dd($request,$id);
        $work = ChallengeWork::findOrFail($id);
        $designer = User::findOrFail($work->designer_id);
        
        $data =[];
        $data['user_id']= Auth::id();
        $data['designer_id'] = $designer->id;
        $data['challengeWork_id'] = $work->id;
        $data['rate'] = $request->stars;
        $data['body'] = $request->body;

       $e =  Evaluation::create($data);

        $message = [
            'title'=>'you have a new reviews',
            'body'=> 'Client '.Auth::user()->name.' add a review in challenge '.$work->challenge->id,
            'action'=>'/panels/DesignerPanel/Challenges/'.$work->challenge->id.'/show',
            'status'=>'new order',
            'created_at'=> $e->created_at->diffForHumans(),
            'order_id'=>$e->id,
        ];
           $designer->notify(new OrderNotification($e,$message));
        return redirect()->route('user.showchallenge',$work->challenge->id)->with('success','work reviews success');
    }

    public function suborder_create(Request $request,$id)
    {
       // dd($request,$id);
        $work = SubOrder::findOrFail($id);
        $designer = User::findOrFail($work->designer_id);
        
        $data =[];
        $data['user_id']= Auth::id();
        $data['designer_id'] = $designer->id;
        $data['sub_order_id'] = $work->id;
        $data['rate'] = $request->stars;
        $data['body'] = $request->body;

       $e =  Evaluation::create($data);

        $message = [
            'title'=>'you have a new reviews',
            'body'=> 'Client '.Auth::user()->name.' add a review in order '.$work->id,
            'action'=>'/panels/DesignerPanel/MyClients/'.$work->subscriptions_id,
            'status'=>'new order',
            'created_at'=> $e->created_at->diffForHumans(),
            'order_id'=>$e->id,
        ];
           $designer->notify(new OrderNotification($e,$message));
            
           $sub = Subscriptions::with('designer','user')->findOrFail($work->subscriptions_id);

           return redirect()->route('myDesignersOrders',$sub)->with('success','order reviews success');
   }

}