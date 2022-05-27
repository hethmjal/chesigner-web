<?php

namespace App\Http\Controllers;

use App\Models\ChallengeWork;
use App\Models\Like;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like(Request $request)
    {
        $like = Like::create(['challenge_id'=>$request->challengeId,'work_id'=>$request->work_id,'user_id'=>Auth::id()]);
        $designer = User::findOrFail($like->challenge->user_id);

        $message = [
            'title'=>'you have a new like',
            'body'=> 'Client '.Auth::user()->name.' like your challenge '.$like->challenge->id,
            'action'=>'/panels/UserPanel/Challenges/'.$like->challenge->id.'/show',
            'status'=>'new order',
            'created_at'=> $like->created_at->diffForHumans(),
            'order_id'=>$like->id,
        ];
           $designer->notify(new OrderNotification($like,$message));
           $like = Like::with('work')->where('id',$like->id)->first();
           return $like;
    }

    public function dislike(Request $request)
    {    
        $like = Like::where('work_id',$request->work_id)->where('user_id',Auth::id())->first();
        $work =  ChallengeWork::findOrFail($like->work_id);

        $dislike = Like::destroy($like->id);
        return $work;
    }
}