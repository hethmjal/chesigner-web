<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Order;
use App\Models\Subscriptions;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;

class ClientsAdminController extends Controller
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
        $users = User::where('type','user')->get();

        @$data = array(
            'title' => 'Admin Panel | Clients Panel',
        );
        
        return view('adminPanel.clientsPanel.index',['users'=>$users])->with($data);
    }

    public function profile($id)
    {
        $user = User::where('id',$id)->first();
        return view('adminPanel.clientsPanel.profile',['user'=>$user]);

        
    }
    
    public function changeUserStatus(Request $request,$id)
    {
        $user = User::find($id);
        $user->status = $request->status;
        $user->save();
        

       return redirect()->route('user.index')->with('client','user status change success');
    }
    
    public function orders($id)
    {
         $user= User::find($id);
        $orders = Order::where('user_id',$id)->get();

        @$data = array(
            "title' => 'Admin Panel | Clients Panel | Orders from user with id $id",
        );
        
        return view('adminPanel.clientsPanel.ordersShow',['orders'=>$orders,'user'=>$user])->with($data);
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
        return redirect()->route('userOrders',$order->user_id)->with('success','status change success');
    }


    
    public function challenges($id)
    {
        $user= User::find($id);
        $challenges = Challenge::where('user_id',$id)->get();
        @$data = array(
            "title' => 'Admin Panel | Clients Panel | Challenges from user with id $id",
        );
        
        return view('adminPanel.clientsPanel.challengesShow',['challenges'=>$challenges,'user'=>$user])->with($data);
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
        return redirect()->route('userChallenges',$request->id)->with('success','status change success');

    }
    
    public function subscription($id)
    {
        $user= User::find($id);
        $subs = Subscriptions::where('user_id',$id)->get();

        @$data = array(
            "title' => 'Admin Panel | Clients Panel | subscriptions that the user with id $id subscribed into it",
        );
        
        return view('adminPanel.clientsPanel.subscriptionShow',['subs'=>$subs,'user'=>$user])->with($data);
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
        //
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