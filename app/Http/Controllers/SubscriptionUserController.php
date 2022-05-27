<?php

namespace App\Http\Controllers;

use App\Models\DesignerPackage;
use App\Models\Packages;
use App\Models\PackagesOrder;
use App\Models\SubOrder;
use App\Models\Subscriptions;
use App\Models\SubWorks;
use App\Models\User;
use App\Notifications\OrderNotification;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Subset;
use SebastianBergmann\Environment\Console;

class SubscriptionUserController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function subscribe_package_request(Request $request)
    {
    //    dd($request);
        $r = PackagesOrder::create([
            'designer_id'=>$request->designer_id,
            'user_id'=>Auth::id(),
            'package_id'=> $request->package_id,
            'designer_package_id'=> $request->designer_package_id,
        ]);
        
        $designer = User::findOrFail($request->designer_id);
        $message = [
            'title'=>'you have a new subscriber',
            'body'=> 'Client '.Auth::user()->name.' want to subscribe with your package '.$r->package->name,
            'action'=>'/panels/DesignerPanel/Orders/MyClients',
            'status'=>'new order',
            'created_at'=> $r->created_at->diffForHumans(),
            'order_id'=>$r->id,
        ];
           $designer->notify(new OrderNotification($r,$message));
       // $s = Subscriptions::with('user','package')->find($sub->id);
       // dd($s->package->name);
        return redirect('/panels/UserPanel/MyDesigners')->with('status','subscripe request in package sent success');
    }

    
    public function store(Request $request)
    {
        $package = Packages::findOrFail($request->package_id);
      //  dd($package->name);
        $sub =   Subscriptions::create([
            'package_id'=> $request->package_id,
            'user_id'=> Auth::id(),
            'designer_id'=>$request->designer_id,
            'done'=>0
        ]);
        
        $s = Subscriptions::with('package')->where('id',$sub->id)->first();
       // dd($s->package->number_of_works);
      
      
        $s->left = $s->package->number_of_works;
        $s->save();
        $designer = User::findOrFail($request->designer_id);
        $message = [
            'title'=>'you have a new subscriber',
            'body'=> 'Client '.Auth::user()->name.' subscribe with your package '.$sub->package->name,
            'action'=>'/panels/DesignerPanel/MyClients/'.$sub->id,
            'status'=>'new order',
            'created_at'=> $sub->created_at->diffForHumans(),
            'order_id'=>$sub->id,
        ];
           $designer->notify(new OrderNotification($sub,$message));
       // $s = Subscriptions::with('user','package')->find($sub->id);
       // dd($s->package->name);
        return redirect('/panels/UserPanel/MyDesigners')->with('status','subscripe in package success');
    }

    public function myDesigners()
    {
        $subs = Subscriptions::with(['package','designer','work','user'])->where('user_id',Auth::id())->latest()->get();

        @$data = array(
            'title' => 'User Panel | My Designers ',
        );
        return view('userPanel.subscriptionPanel.myDesigners',['subs'=>$subs])->with($data);
    }
    




    
    
    public function myDesignersOrders($id)
    {
        
        $orders = SubOrder::with(['designer','user'] )->where('subscriptions_id',$id)->latest()->get();
        $sub =  Subscriptions::with('package')->findOrFail($id);
        @$data = array(
            'title' => 'User Panel | My Designers | Orders',
        );
        return view('userPanel.subscriptionPanel.index',['orders'=>$orders,'sub'=>$sub])->with($data);
    }










    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $designers= DesignerPackage::with(['user','package'])->where('packages_id',$id)->get();
       // dd($designers);
        @$data = array(
            'title' => 'User Panel | Subscription Plans | Designers list',
        );
        return view('userPanel.subscriptionPanel.designerPackage',['designers'=>$designers])->with($data);
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