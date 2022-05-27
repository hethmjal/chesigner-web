<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationDesignerController extends Controller
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
         $this->authorize('viewAny',Education::class);
        $educations =Education::where('user_id',Auth::user()->id)->get();

        @$data = array(
            'title' => 'Designer Panel | My Profile | Education',
        );
        return view('designerPanel.profilePanel.aboutPanel.education',[
            'educations'=>$educations,
        ])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Education::class);
        @$data = array(
            'title' => 'Designer Panel | My Profile | Education - New Education',
        );
        return view('designerPanel.profilePanel.aboutPanel.educationNew')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Education::class);
        $request->validate([
            'specialization'=>'required',
            'university'=>'required',
            'degree'=>'required',
            'from'=>'required|date',
            'to' => 'required|date|after:from'

        ],[
            'to.after'=>'the to date must be after from date  '
        ]);
        $request->merge(['user_id'=>Auth::user()->id]);
        Education::create($request->all());
        return redirect()->route('ProfileDesigner.education')->with('status','Added success');

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
        
       $education = Education::findOrFail($id);
       $this->authorize('update',$education);

        @$data = array(
            'title' => 'Designer Panel | My Profile | Education - Edit Education',
        );
        return view('designerPanel.profilePanel.aboutPanel.educationEdit',['education'=>$education])->with($data);
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
        $education = Education::findOrFail($id);
        $this->authorize('update',$education);
        $request->validate([
            'specialization'=>'required',
            'university'=>'required',
            'degree'=>'required',
            'from'=>'required|date',
            'to' => 'required|date|after:from'

        ],[
            'to.after'=>'the to date must be after from date  '
        ]
    );
        $request->merge(['user_id'=>Auth::user()->id]);
        $education->update($request->all());
        return redirect()->route('ProfileDesigner.education')->with('status','updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {                      
                $education = Education::findOrFail($id);
                $this->authorize('delete',$education);
                Education::destroy($id);
                return redirect()->route('ProfileDesigner.education')->with('status','deleted success');


    }
}