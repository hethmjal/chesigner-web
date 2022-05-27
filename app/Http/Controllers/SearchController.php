<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $designers =User::where('type','designer')->with('skills')->where('name','LIKE','%'.$request->keyword.'%')->get();
        return response()->json(
            $designers
           
         );
    }

    public function chat_search(Request $request)
    {
        $user = Auth::user();
        $chats = $user->conversations()->with([
            'lastMessage',
            'participants'=>function($builder) use($user,$request) {
                $builder->where('id','<>',$user->id);
            }
        ])
        ->whereHas('participants',function($q)use ($request){
            $q->where('name','LIKE','%'.$request->keyword.'%');
        })
        ->get();
      

        return $chats;
    }
}