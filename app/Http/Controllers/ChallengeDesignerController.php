<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Challenge;
use App\Models\ChallengesOrder;
use Illuminate\Http\Request;
use App\Models\ChallengeWork;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderNotification;

class ChallengeDesignerController extends Controller
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
        $challenges = Challenge::latest()->get();
        @$data = array(
            'title' => 'Designer Panel | Challenges',
        );
        
        return view('designerPanel.challengesPanel.index',['challenges'=>$challenges])->with($data);
    }

    public function mychallenges()
    {
        $challenges = ChallengeWork::where('designer_id',Auth::id())->latest()->get();
       // dd($challenges);
        @$data = array(
            'title' => 'Designer Panel | My Challenges',
        );
        
        return view('designerPanel.challengesPanel.myChallenges',['challenges'=>$challenges])->with($data);
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
        $challenge = Challenge::findOrfail($id);
      //  dd($challenge->works);
                @$data = array(
            'title' => 'Designer Panel | Challenges | Show challenge',
        );
        
        return view('designerPanel.challengesPanel.challengeShow',['challenge'=>$challenge])->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $work = ChallengeWork::findOrfail($id);
        $challenge = Challenge::findOrFail($work->challenge_id);
        if ($challenge->status != "Active"){
           return redirect()->back();
        }
        @$data = array(
            'title' => 'Designer Panel | Challenges | Submit work',
        );
        
        return view('designerPanel.challengesPanel.challengeSubmit',['work'=>$work])->with($data);
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
       // dd($request);
       

        $work = ChallengeWork::findOrfail($id);
        $challenge = Challenge::findOrFail($work->challenge_id);
        if ($challenge->status != "Active"){
           return redirect()->back();
        }
        $request->validate([
            'image'=>'required',
            'file'=>'required',
        ]);
        $data = [];
        $data['note'] = $request->note;

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
                $data['submit_work'] = 'yes';
                $work->update($data);
                
                $message = [
                    'title'=>'add work in your challenge',
                    'body'=> 'Designer '.Auth::user()->name.' add work in challenge '.$work->challenge->title,
                    'action'=>'/panels/UserPanel/Challenges/'.$work->challenge->id.'/show',
                    'status'=>'new order',
                    'created_at'=> $work->created_at->diffForHumans(),
                    'order_id'=>$work->id,
                ];
                $user = User::findOrFail($work->challenge->user_id);
                   $user->notify(new OrderNotification($work,$message));
                   return redirect()->route('designer.mychallenge')->with('success','work add success to challenge '.$work->challenge->title);
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
    
   
    public function request_to_join_challenge($challenge_id)
    {
        $challenge = Challenge::findOrFail($challenge_id);
      $order =  ChallengesOrder::create(['challenge_id'=>$challenge_id,'designer_id'=>Auth::id()]);
        $message = [
            'title'=>'subscribe in your challenge',
            'body'=> 'Designer '.Auth::user()->name.' sent a request to subscribe in your challenge '.$challenge->name,
            'action'=>'/panels/UserPanel/Challenges/'.$challenge->id.'/show',
            'status'=>'new order',
            'created_at'=> $order->created_at->diffForHumans(),
            'order_id'=>$order->id,
        ];
            $user = User::findOrFail($challenge->user_id);
           $user->notify(new OrderNotification($order,$message));  
           return redirect()->route('designer.mychallenge')->with('success','request sent to join  challenge '.$challenge->title.' success');

    }

    
    
    public function subscribe($id)
    {
        $challenge = Challenge::findOrfail($id);
        
        $data['designer_id'] = Auth::id();
        $data['challenge_id'] = $challenge->id;
        $data['submit_work'] = "no";
       $work =  ChallengeWork::create($data);
       if(Auth::user()->degree == "Expert"){
        $i=$challenge->remainderofexpert;
        $i++;
        $challenge->remainderofexpert = $i;
        $challenge->save();
    } 
    elseif(Auth::user()->degree == "Professional"){
        $i=$challenge->remainderofprofessional;
        $i++;
        $challenge->remainderofprofessional = $i;
        $challenge->save();
    } elseif(Auth::user()->degree == "Ordinary"){
        $i=$challenge->remainderofordinary;
        $i++;
        $challenge->remainderofordinary = $i;
        $challenge->save();
    }
    if ($challenge->remainderofordinary == $challenge->ordinray &&
    $challenge->remainderofexpert == $challenge->expert &&
   $challenge->remainderofprofessional == $challenge->professional ) {
       $challenge->status ="Active"  ;
       $challenge->expir_date = Carbon::now()->addDays($challenge->deadline);
       $challenge->save();
   
   }
    $message = [
        'title'=>'subscribe in your challenge',
        'body'=> 'Designer '.Auth::user()->name.' subscribe in your challenge '.$challenge->name,
        'action'=>'/panels/UserPanel/Challenges/'.$challenge->id.'/show',
        'status'=>'new order',
        'created_at'=> $work->created_at->diffForHumans(),
        'order_id'=>$work->id,
    ];
        $user = User::findOrFail($challenge->user_id);
       $user->notify(new OrderNotification($work,$message));  
       return redirect()->route('designer.mychallenge')->with('success','subscribe in challenge '.$work->challenge->title.' success');

    }
    
}