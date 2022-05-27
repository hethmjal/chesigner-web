<?php

namespace App\Http\Controllers;

use App\Models\WorkingHours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkingHourDesignerController extends Controller
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
        $this->authorize('viewAny',WorkingHours::class);
        @$data = array(
            'title' => 'Designer Panel | My Profile | Working hours',
        );
        $hours = WorkingHours::where('user_id',Auth::user()->id)->get();
        return view('designerPanel.profilePanel.aboutPanel.workingHours',['hours'=>$hours])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',WorkingHours::class);

        @$data = array(
            'title' => 'Designer Panel | My Profile | Working Hours - New Working Hours',
        );
        return view('designerPanel.profilePanel.aboutPanel.workingHoursNew')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',WorkingHours::class);

        $request->validate([
            'hours'=>'required',
            
        ]);
        $request->merge(['user_id'=>Auth::user()->id]);
        WorkingHours::updateOrCreate(['user_id'=>Auth::user()->id],['hours'=>$request->hours]);
        return redirect()->route('ProfileDesigner.workinghours')->with('status','Added success');
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
        $hour = WorkingHours::findOrFail($id);
        $this->authorize('update',$hour);
        @$data = array(
            'title' => 'Designer Panel | My Profile | WorkingHours - Edit WorkingHours',
        );
        return view('designerPanel.profilePanel.aboutPanel.workingHoursEdit',['hour'=>$hour])->with($data);
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
        $hour = WorkingHours::findOrFail($id);
        $this->authorize('update',$hour);
         $request->validate([
            'hours'=>'required',
            
        ]);
       
        $request->merge(['user_id'=>Auth::user()->id]);
        $hour->update($request->all());
        return redirect()->route('ProfileDesigner.workinghours')->with('status','updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hour = WorkingHours::findOrFail($id);
        $this->authorize('update',$hour);
        WorkingHours::destroy($id);
        return redirect()->route('ProfileDesigner.workinghours')->with('status','deleted success');

    }
}