<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceDesignerController extends Controller
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
        $this->authorize('viewAny',Experience::class);
        $experinces  =Experience::where('user_id',Auth::user()->id)->get();

        @$data = array(
            'title' => 'Designer Panel | My Profile | Experience',
        );
        return view('designerPanel.profilePanel.aboutPanel.experience',['experinces'=>$experinces])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Experience::class);

        @$data = array(
            'title' => 'Designer Panel | My Profile | Experience - New Experience',
        );
        return view('designerPanel.profilePanel.aboutPanel.experienceNew')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Experience::class);

        $request->validate([
            'specialization'=>'required',
            'company'=>'required',
            'time'=>'required',
            'from'=>'required|date',
            'to' => 'required|date|after:from'

        ],[
            'to.after'=>'the to date must be after from date  '
        ]);
        $request->merge([
            'user_id'=>Auth::user()->id,
        ]);
        Experience::create($request->all());
        return redirect()->route('ProfileDesigner.experience')->with('status','Added success');

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
        $experince = Experience::findOrFail($id);
        $this->authorize('update',$experince);

        @$data = array(
            'title' => 'Designer Panel | My Profile | Experince - Edit Experince',
        );
        return view('designerPanel.profilePanel.aboutPanel.experienceEdit',['experince'=>$experince])->with($data);
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
        $experince = Experience::findOrFail($id);

        $this->authorize('update',$experince);
        $request->validate([
            'specialization'=>'required',
            'company'=>'required',
            'time'=>'required',
            'from'=>'required|date',
            'to' => 'required|date|after:from'

        ],[
            'to.after'=>'the to date must be after from date  '
        ]);
        $request->merge(['user_id'=>Auth::user()->id]);
       
        $experince->update($request->all());
        return redirect()->route('ProfileDesigner.experience')->with('status','updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experince = Experience::findORFail($id);
        $this->authorize('delete',$experince);
        Experience::destroy($id);

        return redirect()->route('ProfileDesigner.experience')->with('status','updated deleted');

    }
}