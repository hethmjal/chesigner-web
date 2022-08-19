<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Order_Work;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\OrderNotification;
use phpDocumentor\Reflection\Types\Null_;

class OrderDesignerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::where('designer_id',Auth::id())->where('status','waiting to response')->latest()->get();


      @$data = array(
            'title' => 'Designer Panel | Orders',
        );
        return view('designerPanel.ordersPanel.index',['orders'=>$orders])->with($data);
    }

    public function myorders()
    {
        $orders = Order::where('designer_id',Auth::id())->where('status','Accepted')->latest()->get();

        @$data = array(
            'title' => 'Designer Panel | Orders | My Orders',
        );
        return view('designerPanel.ordersPanel.orderMyOrders',['orders'=>$orders])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        @$data = array(
            'title' => "Designer Panel | Orders | Order #$id",
        );
        $order = Order::where('id',$id)->first();
        return view('designerPanel.ordersPanel.orderShow',['order'=>$order])->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        @$data = array(
            'title' => "Designer Panel | Orders | My Orders | Order #$id | Submit work",
        );
        return view('designerPanel.ordersPanel.orderEdit',['order'=>$order])->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        @$data = array(
            'title' => 'Designer Panel | Orders | My Orders',
        );
        $order = Order::findOrFail($id);
        $order->status = "Accepted";
        $order->save();
        $data1  = [];
        $data1['designer_id'] = $order->designer_id;
        $data1['order_id'] = $order->id;
        $data1['status'] = 'working on';

        Order_Work::create($data1);
        $message = [
            'title'=>'order accepted',
            'body'=> 'Designer '.Auth::user()->name.' accept your invitation '.$order->title,
            'action'=>'/panels/UserPanel/Orders',
            'status'=>'accept',
            'created_at'=> $order->created_at->diffForHumans(),
            'order_id'=>$order->id,
        ];
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
            $order->user_id,Auth::id()
        ]);
    }
        $user = User::findOrFail($order->user_id);
           $user->notify(new OrderNotification($order,$message));
        return redirect()->route('order.myorder');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $message = [
            'title'=>'order rejected',
            'body'=> 'Designer '.Auth::user()->name.' reject your invitation '.$order->title .' at '.now(),
            'action'=>'/panels/UserPanel/Orders',
            'status'=>'rejected',
            'created_at'=> $order->created_at->diffForHumans(),
            'order_id'=>$order->id,
        ];
        $order->status = 'Rejected';
        $order->work_submitted=Null;
        $order->save();
        $user = User::findOrFail($order->user_id);
           $user->notify(new OrderNotification($order,$message));
        return redirect()->route('designer.order.index')->with("success","order deleted success");

    }
}
