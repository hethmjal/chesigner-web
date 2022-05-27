<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Comment;
use App\Models\ReplyComment;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
       // dd($request);
       $comment = Comment::create([
            'body'=>$request->body,
            'user_id'=>Auth::id(),
            'challenge_id'=>$request->challenge_id,
            
        ]);
        $comment = Comment::with('user')->where('id',$comment->id)->first();
        $designer = User::findOrFail($comment->challenge->user_id);

        $message = [
            'title'=>'you have a new comment',
            'body'=> 'Client '.Auth::user()->name.' comment in challenge '.$comment->challenge->id,
            'action'=>'/panels/UserPanel/Challenges/'.$comment->challenge->id.'/show',
            'status'=>'new order',
            'created_at'=> $comment->created_at->diffForHumans(),
            'order_id'=>$comment->id,
        ];
           $designer->notify(new OrderNotification($comment,$message));
        return $comment;
    }



    public function deletecomment(Request $request,$id)
    {$comment = Comment::find($id);
        $challenge = Challenge::findOrFail($comment->challenge_id);

        Comment::destroy($id);

        return redirect()->route('user.showchallenge',$challenge->id)->with('success','delete comment success');
        
    }
    public function reply(Request $request)
    {   $comment = Comment::findOrFail($request->comment_id);
     //   dd($comment->challenge);
       $reply = ReplyComment::create([
            'body'=>$request->body,
            'user_id'=>Auth::id(),
            'challenge_id'=>$comment->challenge_id,
            'comment_id'=>$comment->id
            
        ]);
        $reply = ReplyComment::with('user')->where('id',$reply->id)->first();
         $designer = User::findOrFail($comment->challenge->user_id);

        $message = [
            'title'=>'you have a new reply in a comment',
            'body'=> 'Client '.Auth::user()->name.' comment in challenge '.$comment->challenge->id,
            'action'=>'/panels/UserPanel/Challenges/'.$comment->challenge->id.'/show',
            'status'=>'new order',
            'created_at'=> $reply->created_at->diffForHumans(),
            'order_id'=>$reply->id,
        ];
           $designer->notify(new OrderNotification($reply,$message));
        return $reply;
    }

    public function deletereply(Request $request,$id)
    {$reply = ReplyComment::find($id);
        $challenge = Challenge::findOrFail($reply->challenge_id);

        ReplyComment::destroy($id);

        return redirect()->route('user.showchallenge',$challenge->id)->with('success','delete reply in  comment success');
        
    }
}