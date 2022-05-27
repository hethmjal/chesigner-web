<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
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
        if(Auth::user()->type =='user'){
            $user =Auth::user();
            $notificationes = $user->unreadNotifications;
            //If Designer
            @$data = array(
                'title' => 'Notification Panel | Designer',
            );
            return view('designerPanel.notificationsPanel.index',['notificationes'=>$notificationes])->with($data);
        }
                //End if Designer

        if(Auth::user()->type =='designer'){
            //If User
            $user =Auth::user();
            $notificationes = $user->unreadNotifications;
        @$data = array(
            'title' => 'Notification Panel | User',
        );
        return view('userPanel.notificationsPanel.index',['notificationes'=>$notificationes])->with($data);
        //End if User
        }
        
        if(Auth::user()->type =='admin'){
            $user =Auth::user();
            $notificationes = $user->unreadNotifications;
            //If Designer
            @$data = array(
                'title' => 'Notification Panel | Admin',
            );
            return view('designerPanel.notificationsPanel.index',['notificationes'=>$notificationes])->with($data);
        }
          
       

        
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
        //
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
    public function asread()
    {
        # code...
        $user =Auth::user();
        $notificationes = $user->notifications;
        $notificationes->markAsRead();
        return redirect()->back()->with('not','No Notifications');
    }
    public function update(Request $request,$id)
    {
        $user =Auth::user();
        $notificationes = $user->notifications;
        $notificationes->markAsRead();
        return redirect()->back()->with('not','No Notifications');
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