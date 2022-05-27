<?php

namespace App\Http\Controllers;

use App\Models\DesignerPackage;
use App\Models\User;
use App\Models\Packages;
use App\Models\SubOrder;
use App\Models\SubWorks;
use Mockery\Matcher\Subset;
use Illuminate\Http\Request;
use App\Models\PackagesOrder;
use App\Models\Subscriptions;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderNotification;

class SubscriptionDesignerController extends Controller
{
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
        //
    }

    public function myClients()
    {
        $subs = Subscriptions::with(['package','designer','work','user'])->where('designer_id',Auth::id())->latest()->get();
        $requests = PackagesOrder::where('designer_id',Auth::id())->get();
      //  $works = SubWorks::with('subscription')->get();
       // dd($subs[0]->work[0]->done);
        // dd($works[0]->subscription->designer->name);
        @$data = array(
            'title' => 'Designer Panel | Subscription Plans | Clients list',
        );
        return view('designerPanel.myclientsPanel.index',['subs'=>$subs,'requests'=>$requests])->with($data);
    }
    
    public function myClientsOrders($id)
    {
        $orders = SubOrder::with(['designer','user'] )->where('subscriptions_id',$id)->latest()->get();
      //  dd($subs);
        @$data = array(
            'title' => 'Designer Panel | My Clients | Orders',
        );
        return view('designerPanel.myclientsPanel.listOfWork',['orders'=>$orders])->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //store work
    public function store(Request $request)
    {
        //
    }

   

    public function accept_user_request($packagesOrderId)
    {
        // store method in SubscriptionUserController
      $order = PackagesOrder::findOrFail($packagesOrderId);
        $package = Packages::findOrFail($order->package_id);
      //  dd($package->name);
        $sub =   Subscriptions::create([
            'package_id'=> $order->package_id,
            'user_id'=> $order->user_id,
            'designer_id'=>$order->designer_id,
            'done'=>0
        ]);
        
        $s = Subscriptions::with('package')->where('id',$sub->id)->first();
       // dd($s->package->number_of_works);
      
      
        $s->left = $s->package->number_of_works;
        $s->save();
        $user = User::findOrFail($order->user_id);
        $message = [
            'title'=>'your request to subscribe in package is accepted',
            'body'=> 'Designer '.Auth::user()->name.' accept your request to subscribe in package '.$sub->package->name,
            'action'=>'/panels/UserPanel/MyDesigners/'.$sub->id,
            'status'=>'new order',
            'created_at'=> $sub->created_at->diffForHumans(),
            'order_id'=>$sub->id,
        ];
           $user->notify(new OrderNotification($sub,$message));
           $order->delete();

       // $s = Subscriptions::with('user','package')->find($sub->id);
       // dd($s->package->name);
        return redirect('/panels/DesignerPanel/Orders/MyClients')->with('status','request accepted success');
    }

    public function reject_user_request($packagesOrderId)
    {
        $order = PackagesOrder::findOrFail($packagesOrderId);
        $package = Packages::findOrFail($order->package_id);
        $user = User::findOrFail($order->user_id);

        $message = [
            'title'=>'your request to subscribe in package is rejected',
            'body'=> 'Designer '.Auth::user()->name.' reject our request to subscribe in package '.$package->name,
            'action'=>'/panels/UserPanel/MyDesigners',
            'status'=>'rejected',
            'created_at'=> now()->diffForHumans(),
            'order_id'=>$package->id,
        ];
           $user->notify(new OrderNotification($package,$message));
           $order->delete();

        return redirect('/panels/DesignerPanel/Orders/MyClients')->with('status','request rejected success');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = SubOrder::findOrFail($id);

        @$data = array(
            'title' => 'Designer Panel | My Clients | Orders | Submit an order',
        );
        return view('designerPanel.myclientsPanel.editWork',['order'=>$order])->with($data);
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
        $request->validate([
            'work_image'=>'required',
            'work_file'=>'required',
        ]);
        //dd($request->work_image);
        $order = SubOrder::findOrFail($id);
        $data = $request->all();
        if ($request->hasFile('work_image')) {
           
            $filenameWithExt = $request->file('work_image')->getClientOriginalName ();
            $fileNameToStore = time(). '_'. $filenameWithExt;
            
               $file = $request->file('work_image');
               $image=$file->storeAs('/images',$fileNameToStore,[
                   'disk'=>'uploads'
               ]);                 
              $data['work_image'] = $image;

            }
            if ($request->hasFile('work_file')) {
           
                $filenameWithExt = $request->file('work_file')->getClientOriginalName ();
                $fileNameToStore = time(). '_'. $filenameWithExt;
                
                   $file = $request->file('work_file');
                   $file=$file->storeAs('/files',$fileNameToStore,[
                       'disk'=>'uploads'
                   ]);            
                   $data['file_name'] = $request->file('work_file')->getClientOriginalName();
                   $data['file_ext'] = $request->file('work_file')->extension();;
     
                   $data['work_file'] = $file;

                }
                $data['work_status'] = 'under review';
                $sub = Subscriptions::with(['package','designer','work','user'])->findOrFail($order->subscriptions_id); 

                if(!$order->work_file){
                    $done =$sub->done;
                    $done++;   
                    $left =$sub->left;
                    $left--;        
                    $sub->done= $done; 
                    $sub->left= $left ;
                    $sub->save();
                }
               $order->update($data);
                
              

                $message = [
                    'title'=>'work added',
                    'body'=> 'Designer '.Auth::user()->name.' add a work in subscription '.$sub->id.' order title : '.$order->title,
                    'action'=>'/panels/UserPanel/MyDesigners/'.$sub->id,
                    'status'=>'accept',
                    'created_at'=> $order->updated_at->diffForHumans(),
                    'order_id'=>$order->id,
                ];
                
                $user = User::findOrFail($order->user_id);
                   $user->notify(new OrderNotification($order,$message));
                return redirect()->route('myClientsOrders',$sub->id)->with('status','work added success');
                
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