<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeWork;
use App\Models\Order;
use App\Models\Subscriptions;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Gate;
use Illuminate\Support\Facades\Auth;

class DesignersAdminController extends Controller
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
        $desginers = User::where('type','designer')->get();
        @$data = array(
            'title' => 'Admin Panel | Designers',
        );
        return view('adminPanel.designersPanel.index',['designers'=>$desginers])->with($data);
    }

    public function profile($id)
    {
        $desginer = User::where('id',$id)->first();
        return view('adminPanel.designersPanel.profile',['designer'=>$desginer]);

        
    }
    public function changeDesignerStatus(Request $request,$id)
    {
        $designer = User::find($id);
        $designer->status = $request->status;
        $designer->save();
        

       return redirect()->route('designer.index')->with('success','designer status change success');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        @$data = array(
            'title' => 'Admin Panel | Designers | Add new designer',
        );
        return view('adminPanel.designersPanel.createDesigner')->with($data);
    }

    public function orders($id)
    {
        $user= User::find($id);
        $orders = Order::where('designer_id',$id)->get();
        @$data = array(
            "title' => 'Admin Panel | Clients Panel | Orders from user with id $id",
        );
        
        return view('adminPanel.designersPanel.ordersShow',['orders'=>$orders,'user'=>$user])->with($data);
    }
    public function updateOrder(Request $request,$id)
    {
        $order = Order::find($id);
        $order->adminstatus = $request->adminstatus;
        $order->save();
        if ($order->adminstatus == 'Active') {
            $message = [
                'title'=>"Your order has been reactivated",
                'body'=> "Your request has been reactivated ".$order->title,
                'action'=>'/panels/UserPanel/Orders',
                'status'=>'edit',
                'created_at'=> $order->updated_at->diffForHumans(),
                'order_id'=>$order->id,
            ];
             
        $user = User::findOrFail($order->user_id);
        $user->notify(new OrderNotification($order,$message));

        } else{
            $message = [
                'title'=>"This order has been suspended",
                'body'=> "This order has been suspended because it is against the terms ".$order->title,
                'action'=>'/panels/UserPanel/Orders',
                'status'=>'edit',
                'created_at'=> $order->updated_at->diffForHumans(),
                'order_id'=>$order->id,
            ];
             
        $user = User::findOrFail($order->user_id);
        $user->notify(new OrderNotification($order,$message));
        }
        return redirect()->route('designerOrders',$order->designer_id)->with('success','status change success');
    }

    public function challenges($id)
    {
        $user= User::find($id);
        $works = ChallengeWork::where('designer_id',$id)->get();
        @$data = array(
            "title' => 'Admin Panel | Clients Panel | Challenges from user with id $id",
        );
        
        return view('adminPanel.designersPanel.challengesShow',['works'=>$works,'user'=>$user])->with($data);
    }
    public function updatechallenge(Request $request,$id)
    {
        $challenge = Challenge::find($id);
        $challenge->adminstatus = $request->adminstatus;
        $challenge->save();
        if ($challenge->adminstatus == 'Active') {
            $message = [
                'title'=>"Your challenge has been reactivated",
                'body'=> "Your challenge has been reactivated ".$challenge->title,
                'action'=>'/panels/UserPanel/challenges',
                'status'=>'edit',
                'created_at'=> $challenge->updated_at->diffForHumans(),
                'order_id'=>$challenge->id,
            ];
             
        $user = User::findOrFail($challenge->user_id);
        $user->notify(new OrderNotification($challenge,$message));

        } else{
            $message = [
                'title'=>"This challenge has been suspended",
                'body'=> "This challenge has been suspended because it is against the terms ".$challenge->title,
                'action'=>'/panels/UserPanel/challenges',
                'status'=>'edit',
                'created_at'=> $challenge->updated_at->diffForHumans(),
                'order_id'=>$challenge->id,
            ];
             
        $user = User::findOrFail($challenge->user_id);
        $user->notify(new OrderNotification($challenge,$message));
        
        }
        return redirect()->route('designerChallenges',$request->id)->with('success','status change success');

    }
    
    public function subscription($id)
    {
        $user= User::find($id);
        $subs = Subscriptions::where('designer_id',$id)->get();
        @$data = array(
            "title' => 'Admin Panel | Clients Panel | subscriptions that the user with id $id subscribed into it",
        );
        
        return view('adminPanel.designersPanel.subscriptionShow',['subs'=>$subs,'user'=>$user])->with($data);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        @$data = array(
            'title' => "Admin Panel | Designers | Edit designer with ID $id",
        );
        return view('adminPanel.designersPanel.editDesigner')->with($data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}