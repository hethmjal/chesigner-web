<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportsAdminController extends Controller
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
        $reports = Report::latest()->get();

        @$data = array(
            'title' => 'Admin Panel | Reports Panel',
        );
        
        return view('adminPanel.reportsPanel.index',['reports'=>$reports])->with($data);
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
        $user = User::find(3);
        $reportsFrom = $user->reportsFrom;
        $reportsTo = $user->reportsTo;
 
        @$data = array(
            "title' => 'Admin Panel | Clients Panel | reports from $id & and the reports on $id",
        );
        
        return view('adminPanel.clientsPanel.reportsShow',['reportsFrom'=>$reportsFrom,'reportsTo'=>$reportsTo,'user'=>$user])->with($data);
    }
    
    public function showdesigner($id)
    {
        $user = User::find(3);
       $reportsFrom = $user->reportsFrom;
       $reportsTo = $user->reportsTo;

        @$data = array(
            "title' => 'Admin Panel | Designers Panel | reports from $id & and the reports on $id",
        );
        
        return view('adminPanel.designersPanel.reportsShow',['reportsFrom'=>$reportsFrom,'reportsTo'=>$reportsTo,'user'=>$user])->with($data);
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
        //
    }
}