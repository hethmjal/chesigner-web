<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use App\Models\Order;
use App\Models\Order_Work;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

class OrderUserController extends Controller
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
        
        @$data = array(
            'title' => 'User Panel | My Orders',
        );
        $orders = Order::where('user_id',Auth::id())->latest()->get();
       

        return view('userPanel.ordersPanel.index',['orders'=>$orders])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $designers = User::with('skills')->where('type','designer')->get();
        //return $designers;
        @$data = array(
            'title' => "User Panel | Orders | New order",
        );
        return view('userPanel.ordersPanel.orderNew',['designers'=>$designers])->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required|file',
            'title'=>'required',
            'type'=>'required',
            'designer_id'=>'required',
            'description'=>'required',
            'deadline'=>'required|date|after:tomorrow'
        ]);
        $designers_id = $request->designer_id;
        foreach ($designers_id as  $designer_id) {
            $designer = User::findOrFail($designer_id); 
            $data = $request->all();
            $data['designer_id'] = $designer->id;
            $data['designer_name'] = $designer->name;
            if ($request->hasFile('image')) {
           
                $filenameWithExt = $request->file('image')->getClientOriginalName ();
                $fileNameToStore = time(). '_'. $filenameWithExt;
                
                   $file = $request->file('image');
                   $image=$file->storeAs('/images',$fileNameToStore,[
                       'disk'=>'uploads'
                   ]);                 
                   $data['image'] = $image;
                   $data['user_id']= Auth::user()->id;
                  $order = Order::create($data);
                  $message = [
                    'title'=>'you have a new order',
                    'body'=> 'Client '.Auth::user()->name.' invited you to do a design',
                    'action'=>'/panels/DesignerPanel/Orders',
                    'status'=>'new order',
                    'created_at'=> $order->created_at->diffForHumans(),
                    'order_id'=>$order->id,
                ];
                   $designer->notify(new OrderNotification($order,$message));
                }
            
        }

        return redirect()->route('user.order.index')->with("success","order created success");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $order = Order::findOrFail($id);
        $designer= User::findOrFail($order->designer_id);
        $user_id = Null;
        $designer_id = $designer->id;

    if (Auth::user()->type == 'admin') {
        $user= User::findOrFail($order->user_id);
        $user_id = $user->id;
        $conversation = Conversation::where('type','=','peer')
        ->whereHas('participants',function ($builder) use ($designer_id,$user_id) {
            $builder->join('participants as participants2','participants2.conversation_id' ,'=','participants.conversation_id')
            ->where('participants.user_id','=',$designer_id)
            ->where('participants2.user_id','=',$user_id);
        })->first(); 
    }else{
        $conversation = Conversation::where('type','=','peer')
       ->whereHas('participants',function ($builder) use ($designer_id) {
           $builder->join('participants as participants2','participants2.conversation_id' ,'=','participants.conversation_id')
           ->where('participants.user_id','=',$designer_id)
           ->where('participants2.user_id','=',Auth::id());
       })->first();  
    }
       // ;
           
        @$data = array(
            'title' => "User Panel | Orders | Order #$id",
        );
        return view('userPanel.ordersPanel.orderShow',['order'=>$order,'conversation'=>$conversation])->with($data);
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
        $designer = User::findOrFail($order->designer_id);
        @$data = array(
            'title' => "User Panel | Orders | Edit Order #$id",
        );
        return view('userPanel.ordersPanel.orderEdit',['order'=>$order,'designer'=>$designer])->with($data);
    }

    public function work_user(Request $request,$id)
    {
        $request->validate([
        ]);
        $work = Order_Work::findOrFail($id);
        $work->user_note = $request->user_note;
        $work->status = $request->status;
        $work->save();
       $user = User::findOrFail($work->order->user_id);
        if ($work->status == 'edit') {
            $message = [
                'title'=>"you have a note from ".Auth::user()->name,
                'body'=> "user". Auth::user()->name." need a edit in order ".$work->order->title,
                'action'=>'/panels/UserPanel/Orders',
                'status'=>'edit',
                'created_at'=> $work->order->updated_at->diffForHumans(),
                'order_id'=>$work->order->id,
            ];
             
        $user = User::findOrFail($work->order->designer_id);
        $user->notify(new OrderNotification($work->order,$message));

        } 
        if($work->status == 'Accepted'){
            $message = [
                'title'=>"Congratulaion work accepted ",
                'body'=> "user". Auth::user()->name." accept your work in order ".$work->order->title,
                'action'=>'/panels/UserPanel/Orders',
                'status'=>'accept',
                'created_at'=> $work->order->updated_at->diffForHumans(),
                'order_id'=>$work->order->id,
            ];
             
        $user = User::findOrFail($work->order->designer_id);
        $order = Order::findOrFail($work->order->id);
        $order->work_submitted = "submitted";
        $order->save();
        $user->notify(new OrderNotification($work->order,$message));

        }
        return redirect()->route('user.order.index');

       
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
            'image'=>'file',
            'title'=>'required',
            'type'=>'required',
            'description'=>'required',
            'deadline'=>'required|date|after:tomorrow'
        ]);
        $order = Order::findOrFail($id);
        $order->title = $request->title;
        $order->description= $request->description;
        $order->deadline = $request->deadline; 
        $order->type = $request->type;

            if ($request->hasFile('image')) {
           
                $filenameWithExt = $request->file('image')->getClientOriginalName ();
                $fileNameToStore = time(). '_'. $filenameWithExt;
                
                   $file = $request->file('image');
                   $image=$file->storeAs('/images',$fileNameToStore,[
                       'disk'=>'uploads'
                   ]);                 
                  $order->image = $image;

                }
                $order->save();

                return redirect()->route('user.order.index')->with("success","order updated success");

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

        Order::destroy($id);
        Storage::disk('uploads')->delete($order->image);

        return redirect()->route('user.order.index')->with("success","order deleted success");

    }
}