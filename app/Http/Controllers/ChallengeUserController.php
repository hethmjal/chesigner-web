<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Favorite;
use App\Models\Challenge;
use App\Models\ChallengeData;
use App\Models\ChallengeFile;
use App\Models\ChallengesOrder;
use Illuminate\Http\Request;
use App\Models\ChallengeWork;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Notifications\OrderNotification;
use Symfony\Component\VarDumper\Cloner\Data;

class ChallengeUserController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $challenges = Challenge::latest()->get();
        @$data = array(
            'title' => 'User Panel | Challenges',
        );
        
        return view('userPanel.challengesPanel.index',['challenges'=>$challenges])->with($data);
    }
    public function mychallenges()
    {
        $challenges = Challenge::with('works')->where('user_id',Auth::id())->latest()->get();
       
        @$data = array(
            'title' => 'User Panel | My Challenges',
        );
        
        return view('userPanel.challengesPanel.myChallenges',['challenges'=>$challenges])->with($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        @$data = array(
            'title' => 'User Panel | My Challenges',
        );
        
        return view('userPanel.challengesPanel.challengeNew')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function a(Request $request)
    {
 
        if ($request->hasFile('audio_data')) {
            $fileNameToStore = time(). '_sound'.".wav";
               $file = $request->file('audio_data');
               $path=$file->storeAs('/audio',$fileNameToStore,[
                   'disk'=>'uploads'
               ]);
             $file =   ChallengeFile::create([
                   'user_id' => Auth::id(),
                    'file'  => $path,             
               ]);
               $id = $file->id;
               return $id; 
            }
          
            return null;

}


    public function store(Request $request)
    {
     //  dd($request->all());
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'expert'=>'required|numeric|min:0',  
            'professional'=>'required|numeric|min:0',  
            'ordinary'=>'required|numeric|min:0',  
            'deadline'=>'required',

        ]);
    $file = "";
    $data=[];

     //  $data    = $request->all();
          
       if ($request->file_id) {
        $file = ChallengeFile::find($request->file_id);
                $data['audio_file'] = $file->file;
                $file->delete();

    }  
    if ($request->hasFile('video')) {
        // Filename To store
        $filenameWithExt = $request->file('video')->getClientOriginalName ();
        $fileNameToStore = time(). '_'. $filenameWithExt;
        
           $file = $request->file('video');
           $video=$file->storeAs('/videos',$fileNameToStore,[
               'disk'=>'uploads'
           ]);
         
           $data['video'] = $video;

        }

   //    dd($request);
       if($request->challenge_type == "Public") {
        $data['title']= $request->title;
        $data['status']= 'Stopped';
        $data['expert']= $request->expert;
        $data['professional']= $request->professional;
        $data['ordinary']= $request->ordinary;
        
        
        $data['description']= $request->description;
        $data['challenge_type']= $request->challenge_type;
        $data['design_type']= $request->design_type;
        $data['deadline']= $request->deadline;
     //   dd($data);
        if ($request->hasFile('image')) {
         // Filename To store
         $filenameWithExt = $request->file('image')->getClientOriginalName ();
         $fileNameToStore = time(). '_'. $filenameWithExt;
         
            $file = $request->file('image');
            $image=$file->storeAs('/images',$fileNameToStore,[
                'disk'=>'uploads'
            ]);
            // $data = $request->all();
            $data['image'] = $image;
         }
       
          
        $data['user_id']= Auth::user()->id;
        $data['remainderofexpert']= 0;
        $data['remainderofprofessional']= 0;
        $data['remainderofordinary']= 0;
        $data2 = [];
        
             $data2['Classic']=$request->data1;
             $data2['Modern']=100-$request->data1;
            
        
            $data2['Symbolic']=$request->data2;
            $data2['Text']=100-$request->data2;
        
       
            $data2['Unformal']= $request->data3;
            $data2['Formal']=100-$request->data3;
       
        
            $data2['Geometreic']=$request->data4;
            $data2['Free']=100-$request->data4;
        
            $data2['Economy']=$request->data5;
            $data2['Luxury'] = 100-$request->data5;
          //  dd($data);
            $c =  Challenge::create($data);
            $data2['challenge_id']=$c->id;

            ChallengeData::create($data2);
     }
      
     
     else {
              
        $data['title']= $request->title;
        $data['status']= 'Stopped';
        $data['expert']= $request->expert;
        $data['professional']= $request->professional;
        $data['ordinary']= $request->ordinary;
        
       
        $data['description']= $request->description;
        $data['challenge_type']= $request->challenge_type;
        $data['design_type']= $request->design_type;
        $data['deadline']= $request->deadline;
        
        if ($request->hasFile('image')) {
         // Filename To store
         $filenameWithExt = $request->file('image')->getClientOriginalName ();
         $fileNameToStore = time(). '_'. $filenameWithExt;
         
            $file = $request->file('image');
            $image=$file->storeAs('/images',$fileNameToStore,[
                'disk'=>'uploads'
            ]);
            // $data = $request->all();
          
            $data['image'] = $image;
         }
         $data['user_id'] = Auth::id();
         $data['remainderofexpert']= 0;
         $data['remainderofprofessional']= 0;
         $data['remainderofordinary']=0;
         $data2 = [];
         $data2['Classic']=$request->data1;
         $data2['Modern']=100-$request->data1;
        
    
        $data2['Symbolic']=$request->data2;
        $data2['Text']=100-$request->data2;
    
   
        $data2['Unformal']= $request->data3;
        $data2['Formal']=100-$request->data3;
   
    
        $data2['Geometreic']=$request->data4;
        $data2['Free']=100-$request->data4;
    
        $data2['Economy']=$request->data5;
        $data2['Luxury'] = 100-$request->data5;
    
        $challenge =  Challenge::create($data);
        $data2['challenge_id']=$challenge->id;

        ChallengeData::create($data2);
         
        $designers_id = $request->designers_id;
        foreach ($designers_id as  $designer_id) {
            $designer = User::findOrFail($designer_id);
            $data2 = [];
            $data2['designer_id'] = $designer->id;
            $data2['challenge_id'] = $challenge->id;
            $data2['submit_work'] = "no";
           $work =  ChallengeWork::create($data2);
           
            if($designer->degree == "Expert"){
                $i=$challenge->remainderofexpert;
                $i++;
                $challenge->remainderofexpert = $i;
                $challenge->save();
            } 
            elseif($designer->degree == "Professional"){
                $i=$challenge->remainderofprofessional;
                $i++;
                $challenge->remainderofprofessional = $i;
                $challenge->save();
            } elseif($designer->degree =="Ordinary"){
                $i=$challenge->remainderofordinary;
                $i++;
                $challenge->remainderofordinary = $i;
                $challenge->save();
            }

            
            $message = [
                'title'=>'you have invite to challenge',
                'body'=> 'Client '.Auth::user()->name.' invite you to participate in challenge',
                'action'=>'/panels/DesignerPanel/MyChallenges',
                'status'=>'new order',
                'created_at'=> $work->created_at->diffForHumans(),
                'order_id'=>$work->id,
            ];
               $designer->notify(new OrderNotification($work,$message));
        }
        if ($challenge->remainderofordinary == $challenge->ordinray &&
        $challenge->remainderofexpert == $challenge->expert &&
       $challenge->remainderofprofessional == $challenge->professional ) {
           $challenge->status ="Active"  ;
           $challenge->expir_date = Carbon::now()->addDays($challenge->deadline);
           $challenge->save();
       
       }
    
            
    
       }
       return redirect()->route('user.mychallenge')->with('success','challenge created success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
       $challenge = Challenge::findOrFail($id);
      // $challenge = ChallengeWork::findOrFail(6);
      //dd($challenge->works[1]->evaluation->rate);
       //dd($challenge->orders);
        @$data = array(
            'title' => 'User Panel | Challenges | Show challenge',
        );
        
        return view('userPanel.challengesPanel.challengeShow',['challenge'=>$challenge])->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*  $challenge = Challenge::where('status','Active')->first();
         $t = now()->format('Y-m-d H:i:s');
              dd($challenge->expir_date );

         
        if ($challenge->expir_date == now() || $challenge->expir_date >= now() ) {
          
            $challenge->status ="Finished";
            $challenge->save();
            $u= User::find($challenge->user_id);
            $message = [
                'title'=>'challenge finished',
                'body'=> 'challenge '.$challenge->name." is finished now",
                'action'=>'/panels/UserPanel/Challenges/'.$challenge->id.'/show',
                'status'=>'new order',
                'created_at'=>now()->diffForHumans(),
                'order_id'=>$challenge->id,
            ];
               $u->notify(new OrderNotification($challenge,$message)); 
            foreach ($challenge->works as $work) {
                $user = User::find($work->designer_id);
                $message = [
                    'title'=>'challenge finished',
                    'body'=> 'challenge '.$challenge->name." is finished now",
                    'action'=>'/panels/DesignerPanel/Challenges/'.$challenge->id.'/show',
                    'status'=>'new order',
                    'created_at'=>now()->diffForHumans(),
                    'order_id'=>$work->id,
                ];
                   $user->notify(new OrderNotification($work,$message)); 
            }
        } */
        $challenge = Challenge::with('data')->findOrFail($id);
     //   dd($challenge);
        @$data = array(
            'title' => 'User Panel | Challenges | Edit challenge',
        );
        
        return view('userPanel.challengesPanel.challengeEdit',['challenge'=>$challenge])->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function delete_file(Request $request)
     {
        // return $request->id;
         $c = Challenge::findOrFail($request->id);
         Storage::disk('uploads')->delete($c->audio_file);

         $c->audio_file = null;
         $c->save(); 

         return  "success";
        
        }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'expert'=>'required|numeric|min:0',  
            'professional'=>'required|numeric|min:0',  
            'ordinary'=>'required|numeric|min:0',  
            'deadline'=>'required',

        ]);
        $file = "";
        $data=[];
    
         //  $data    = $request->all();
         $challenge = Challenge::findOrFail($id);

           if ($request->file_id) {
            $file = ChallengeFile::find($request->file_id);
            Storage::disk('uploads')->delete($challenge->audio_file);

                  $challenge->audio_file = $file->file;
                  
                  $challenge->save();
                    $file->delete();           
        }  
         
        if ($request->hasFile('video')) {
            // Filename To store
            $filenameWithExt = $request->file('video')->getClientOriginalName ();
            $fileNameToStore = time(). '_'. $filenameWithExt;
            
               $file = $request->file('video');
               $video=$file->storeAs('/videos',$fileNameToStore,[
                   'disk'=>'uploads'
               ]);
             
               $data['video'] = $video;
               Storage::disk('uploads')->delete($challenge->video);
  
            }
       //  dd($request);
        if($request->challenge_type == "Public") {
         $data['title']= $request->title;
         
         $data['expert']= $request->expert;
         $data['professional']= $request->professional;
         $data['ordinary']= $request->ordinary;
         
         
         $data['description']= $request->description;
         $data['challenge_type']= $request->challenge_type;
         $data['design_type']= $request->design_type;
         $data['deadline']= $request->deadline;
         if ($request->hasFile('image')) {
          // Filename To store
          $filenameWithExt = $request->file('image')->getClientOriginalName ();
          $fileNameToStore = time(). '_'. $filenameWithExt;
          
             $file = $request->file('image');
             $image=$file->storeAs('/images',$fileNameToStore,[
                 'disk'=>'uploads'
             ]);
              $data = $request->all();
           
             $data['image'] = $image;
             Storage::disk('uploads')->delete($challenge->image);

          }
          $data['user_id']= Auth::user()->id;
 
        
          $data2 = [];
         $data2['Classic']=$request->data1;
         $data2['Modern']=100-$request->data1;
        
    
        $data2['Symbolic']=$request->data2;
        $data2['Text']=100-$request->data2;
    
   
        $data2['Unformal']= $request->data3;
        $data2['Formal']=100-$request->data3;
   
    
        $data2['Geometreic']=$request->data4;
        $data2['Free']=100-$request->data4;
    
        $data2['Economy']=$request->data5;
        $data2['Luxury'] = 100-$request->data5;
    
        $data2['challenge_id']=$challenge->id;
        $challenge_data = ChallengeData::where('challenge_id',$challenge->id)->first();
        $challenge_data->update($data2);
         $challenge->update($data);
      }
       
      
      else {
         
         
        
         $data['title']= $request->title;
         $data['expert']= $request->expert;
         $data['professional']= $request->professional;
         $data['ordinary']= $request->ordinary;
         
        
         $data['description']= $request->description;
         $data['challenge_type']= $request->challenge_type;
         $data['design_type']= $request->design_type;
         $data['deadline']= $request->deadline;
         
         if ($request->hasFile('image')) {
          // Filename To store
          $filenameWithExt = $request->file('image')->getClientOriginalName ();
          $fileNameToStore = time(). '_'. $filenameWithExt;
          
             $file = $request->file('image');
             $image=$file->storeAs('/images',$fileNameToStore,[
                 'disk'=>'uploads'
             ]);
              $data = $request->all();
           
             $data['image'] = $image;
             Storage::disk('uploads')->delete($challenge->image);

          }
          
          $data['user_id'] = Auth::id();
          $data['remainderofexpert']= 0;
          $data['remainderofprofessional']= 0;
          $data['remainderofordinary']=0;
          $data2 = [];
          $data2['Classic']=$request->data1;
          $data2['Modern']=100-$request->data1;
         
     
         $data2['Symbolic']=$request->data2;
         $data2['Text']=100-$request->data2;
     
    
         $data2['Unformal']= $request->data3;
         $data2['Formal']=100-$request->data3;
    
     
         $data2['Geometreic']=$request->data4;
         $data2['Free']=100-$request->data4;
     
         $data2['Economy']=$request->data5;
         $data2['Luxury'] = 100-$request->data5;
     
         $challenge =  Challenge::create($data);
         $data2['challenge_id']=$challenge->id;
          $challenge_data = ChallengeData::where('challenge_id',$challenge->id)->first();
         $challenge_data->update($data2);
        $challenge->update($data);
          
         $designers_id = $request->designers_id;
         foreach ($designers_id as  $designer_id) {
             $designer = User::findOrFail($designer_id);
             $data2 = [];
             $data2['designer_id'] = $designer->id;
             $data2['challenge_id'] = $challenge->id;
             $data2['submit_work'] = "no";
            $work =  ChallengeWork::create($data2);
            
             if($designer->degree == "Expert"){
                 $i=$challenge->remainderofexpert;
                 $i++;
                 $challenge->remainderofexpert = $i;
                 $challenge->save();
             } 
             elseif($designer->degree == "Professional"){
                 $i=$challenge->remainderofprofessional;
                 $i++;
                 $challenge->remainderofprofessional = $i;
                 $challenge->save();
             } elseif($designer->degree =="Ordinary"){
                 $i=$challenge->remainderofordinary;
                 $i++;
                 $challenge->remainderofordinary = $i;
                 $challenge->save();
             }
 
             
             $message = [
                 'title'=>'you have invite to challenge',
                 'body'=> 'Client '.Auth::user()->name.' invite you to participate in challenge',
                 'action'=>'/panels/DesignerPanel/MyChallenges',
                 'status'=>'new order',
                 'created_at'=> $work->created_at->diffForHumans(),
                 'order_id'=>$work->id,
             ];
                $designer->notify(new OrderNotification($work,$message));
         }
         if ($challenge->remainderofordinary == $challenge->ordinray &&
         $challenge->remainderofexpert == $challenge->expert &&
        $challenge->remainderofprofessional == $challenge->professional ) {
            $challenge->status ="Active"  ;
            $challenge->expir_date = Carbon::now()->addDays($challenge->deadline);
            $challenge->save();
        
        }
     
        }
        return redirect()->route('user.mychallenge')->with('success','challenge created success!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $challenge = Challenge::findOrFail($id);
          Storage::disk('uploads')->delete($challenge->audio_file);
        Storage::disk('uploads')->delete($challenge->image);
        $challenge->delete();
        return redirect()->route('user.mychallenge')->with('success','challenge deleted success!');

        
    }

    
    public function accept_challenge_request($order_id)
    {
        $order = ChallengesOrder::findOrFail($order_id);
        $challenge = Challenge::findOrfail($order->challenge_id);
        
        $data['designer_id'] = $order->designer_id;
        $data['challenge_id'] = $challenge->id;
        $data['submit_work'] = "no";
       $work =  ChallengeWork::create($data);
       if($order->designer->degree == "Expert"){
        $i=$challenge->remainderofexpert;
        $i++;
        $challenge->remainderofexpert = $i;
        $challenge->save();
    } 
    elseif($order->designer->degree == "Professional"){
        $i=$challenge->remainderofprofessional;
        $i++;
        $challenge->remainderofprofessional = $i;
        $challenge->save();
    } elseif($order->designer->degree == "Ordinary"){
        $i=$challenge->remainderofordinary;
        $i++;
        $challenge->remainderofordinary = $i;
        $challenge->save();
    }
    $challenge2 = Challenge::findOrfail($order->challenge_id);
    
    if ($challenge2->remainderofordinary == $challenge2->ordinary &&
    $challenge2->remainderofexpert == $challenge2->expert &&
   $challenge2->remainderofprofessional == $challenge2->professional ) {
       
       $challenge->status ="Active"  ;
       $challenge->expir_date = Carbon::now()->addDays($challenge->deadline)->format('Y-m-d H:i:s');
       $challenge->save();
   
   }
   $order->delete();

    $message = [
        'title'=>'accept a request to join challenge',
        'body'=> 'Client '.Auth::user()->name.' accept your request to join  challenge '.$challenge->name,
        'action'=>'/panels/DesignerPanel/Challenges/'.$challenge->id.'/show',
        'status'=>'new order',
        'created_at'=> $work->created_at->diffForHumans(),
        'order_id'=>$work->id,
    ];
        $designer = User::findOrFail($order->designer_id);
       $designer->notify(new OrderNotification($work,$message));  
       return redirect()->route('user.showchallenge',$challenge->id)->with('success','accept request success');
    }





    public function reject_challenge_request($order_id)
    {
        $order = ChallengesOrder::findOrFail($order_id);
        $challenge = Challenge::findOrfail($order->challenge_id);
        $order->delete();
        $time = now();
        $message = [
            'title'=>'reject a request to join challenge',
            'body'=> 'Client '.Auth::user()->name.' accept your request to join  challenge '.$challenge->title,
            'action'=>'/panels/DesignerPanel/Challenges/'.$challenge->id.'/show',
            'status'=>'rejected',
            'created_at'=> $time->diffForHumans(),
            'order_id'=>$order->id,
        ];
            $designer = User::findOrFail($order->designer_id);
            $designer->notify(new OrderNotification($challenge,$message));  
            return redirect()->route('user.showchallenge',$challenge->id)->with('success','reject request success');

    }


















    public function rank(Request $request ,$id)
    {
        $work = ChallengeWork::findOrFail($id);
        $challenge = Challenge::findOrFail($work->challenge_id);
        foreach ($challenge->works as $work) {
           if ($work->rank == $request->rank) {
               
            return redirect()->route('user.showchallenge',$challenge->id)->with('error','Error another designer has the same review');
            
           }
        }
        $work = ChallengeWork::findOrFail($id);
        $work->rank = $request->rank;
        $work->save();
           
        $message = [
            'title'=>Auth::user()->name.' added a review for the challenge ',
            'body'=> 'Client '.Auth::user()->name.'  added a review for the challenge '.$challenge->title.' your rank is '.$work->rank ,
            'action'=>'/panels/DesignerPanel/MyChallenges',
            'status'=>'new order',
            'created_at'=> $work->created_at->diffForHumans(),
            'order_id'=>$work->id,
        ];
        $designer = User::findOrFail($work->designer_id);
           $designer->notify(new OrderNotification($work,$message));
        $i=0;
        $numofwork = count($challenge->works);
        foreach ($challenge->works as  $work) {
            if ($work->rank) {
                ++$i;
            }
        }
       // dd($i);
        if ($numofwork == $i) {
            $challenge->status= "Finished";
            $challenge->save(); 
        }

        return redirect()->route('user.showchallenge',$challenge->id)->with('success','review add success');
}

    public function favorite($id)
    {
        Favorite::create([
            'user_id'=>Auth::id(),
            'challenge_id'=>$id
        ]);
        if (Auth::user()->type == "user") {
            return redirect()->route('user.challenge')->with('success','challenge added to favorite page success');

        } else {
            return redirect()->route('designer.challenge')->with('success','challenge added to favorite page success');
        
        }
            }


            public function unfavorite($id)
            {
                Favorite::destroy($id);
            
            
            if (Auth::user()->type == "user") {
                return redirect()->route('user.favorite')->with('success','challenge remove from favorite page success');
    
            } else {
                return redirect()->route('designer.favorite')->with('success','challenge remove from favorite page success');
            
            }
            }
}