<?php

namespace App\Http\Controllers;

use App\Models\Programer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramDesignerController extends Controller
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
        $this->authorize('viewAny',Programer::class);
        @$data = array(
            'title' => 'Designer Panel | My Profile | Programs',
        );
        $programes = Programer::where('user_id',Auth::user()->id)->get();    
          return view('designerPanel.profilePanel.aboutPanel.program',['programes'=>$programes])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Programer::class);

        @$data = array(
            'title' => 'Designer Panel | My Profile | Programs - New Program',
        );
        return view('designerPanel.profilePanel.aboutPanel.programNew')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Programer::class);

        $request->validate([
            'experience'=>'required',
            'programers'=>'required',
        ]);
        $request->merge(['user_id'=>Auth::user()->id]);
        Programer::create($request->all());
        return redirect()->route('ProfileDesigner.program')->with('status','Added success');

        
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
        $programe = Programer::findOrFail($id);
        $this->authorize('update',$programe);

        @$data = array(
            'title' => 'Designer Panel | My Profile | Programe - Edit Programe',
        );
        return view('designerPanel.profilePanel.aboutPanel.programEdit',['programe'=>$programe])->with($data);
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
        $programe = Programer::findOrFail($id);
        $this->authorize('update',$programe);
        $request->validate([
            'experience'=>'required',
            'programers'=>'required',
        ]);
        $request->merge(['user_id'=>Auth::user()->id]);
        $programe->update($request->all());
        return redirect()->route('ProfileDesigner.program')->with('status','updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $programe = Programer::findOrFail($id);
        $this->authorize('delete',$programe);
        Programer::destroy($id);
        return redirect()->route('ProfileDesigner.program')->with('status','deleted success');

    }
}