<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use App\Models\Recipient;
use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Events\MessageCreated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;

class MessagesController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = Auth::user();
        $conversation = $user->conversations()->findOrFail($id);
        return $conversation->messages;
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
            'message'=>['required','string'],
            'conversation_id'=>[ ValidationRule::requiredIf(function () use ($request)
            {
                return !$request->input('user_id');
            }),
            'int','exists:conversations,id'],

            'user_id'=>[ ValidationRule::requiredIf(function () use ($request)
            {
                return !$request->input('conversation_id');
            }),
            'int','exists:users,id'],
        ]);
        //sender
        $user = Auth::user();
        $conversation_id = $request->post('conversation_id');
        //reciver
        $user_id = $request->post('user_id');
       
            DB::beginTransaction();
            try{
                if ($conversation_id) {
                    $conversation = $user->conversations()->findOrFail($conversation_id);
                }else{
                    
                    $conversation = Conversation::where('type','=','peer')
                    ->whereHas('participants',function ($builder) use ($user,$user_id) {
                        $builder->join('participants as participants2','participants2.conversation_id' ,'=','participants.conversation_id')
                        ->where('participants.user_id','=',$user_id)
                        ->where('participants2.user_id','=',$user->id);
                    })->first();
                    if (!$conversation) {
                        $conversation = Conversation::create([
                            'user_id'=>$user->id,
                            'type'=>'peer'
                        ]);  
                        
                        $conversation->participants()->attach([
                            $user->id,$user_id
                        ]);
                    }
                }
            $message = $conversation->messages()->create([
                'user_id'=>$user->id,
                'body'=>$request->post('message'),
            ]);


       
           


            DB::statement(
                'INSERT INTO recipients (user_id, message_id) 
                SELECT user_id, ? FROM participants
                WHERE conversation_id = ?
                ',
            
            [$message->id,$conversation->id]);
            
            $conversation->update([
                'last_message_id'=>$message->id
            ]);











            $user = Auth::user();
            $chats = $user->conversations()->with([
                'lastMessage',
                'participants'=>function($builder) use($user) {
                    $builder->where('id','<>',$user->id);
                }
            ])
           
            ->get();
          // return $chats;
           
                $activeChat = $chats->where('id',$request->conversation_id)->first();
                $msg = $activeChat->messages()->with(['recipients'=>function($q){
                    $q->where('user_id',Auth::id());
                }])->get();
                $read_at = '';

              //  dd($msg);
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
            


            DB::commit();
            broadcast(new MessageCreated($message));
            }catch(Throwable $e){
                DB::rollBack();
                throw $e;
            }
        return  $message;
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
        Recipient::where([
            'user_id'=>Auth::id(),
            'message_id'=>$id
        ])->delete();
        return ['message'=>'deleted'];
    }
}