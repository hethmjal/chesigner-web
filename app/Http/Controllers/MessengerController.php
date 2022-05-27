<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessengerController extends Controller
{
    public function index ($id =null) {



        
        $user = Auth::user();
        $chats = $user->conversations()->with([
            'lastMessage',
            'participants'=>function($builder) use($user) {
                $builder->where('id','<>',$user->id);
            }
        ])
       
        ->get();
      // return $chats;
        $messages = [];
        $activeChat = null;
        if ($id) {
            $activeChat = $chats->where('id',$id)->first();
            $messages = $activeChat->messages()->with('user')->get();
            $msg = $activeChat->messages()->with(['recipients'=>function($q){
                $q->where('user_id',Auth::id());
            }])->get();
            $read_at = '';
            foreach ($msg as $message) {
                foreach ($message->recipients as $recipient) {
                    # code...
                    $read_at = $recipient->pivot;
                    if ($read_at->read_at == null) {
                         $read_at->read_at = now();
                        # code...
                         $read_at->update();
                    }
                }
            }
        }
       //dd($messages[0]->user);
        return view('userPanel/messagesPanel/index',['chats'=>$chats,'messages'=>$messages,'activeChat'=>$activeChat]);
    }
}