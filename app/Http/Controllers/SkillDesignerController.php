<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillDesignerController extends Controller
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
        $this->authorize('viewAny',Skill::class);
        @$data = array(
            'title' => 'Designer Panel | My Profile | Skills',
        );

        $skills = Skill::where('user_id',Auth::user()->id)->get();
        return view('designerPanel.profilePanel.aboutPanel.skill',[
            'skills' => $skills
        ])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Skill::class);
        @$data = array(
            'title' => 'Designer Panel | My Profile | Skills - New Skill',
        );
        return view('designerPanel.profilePanel.aboutPanel.skillNew')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',Skill::class);

        $request->validate(
            [
                'skills'=>'required'
            ]
        );
        $skills = $request->skills;
        if(is_array($skills) && count($skills) > 0){
           
            foreach($skills as $skill){
                $skill_name = $skill;
                 Skill::updateOrCreate(['user_id'=>Auth::user()->id,'skills' => $skill_name,],[
                    'skills' => $skill_name,
                    
                ]);
               
            }
        }
        return redirect()->route('ProfileDesigner.skill')->with('status','Added success');

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
        $skill = Skill::findOrFail($id);
        $this->authorize('update',$skill);

        @$data = array(
            'title' => 'Designer Panel | My Profile | Skills - New Skill',
        );
        return view('designerPanel.profilePanel.aboutPanel.skillEdit',[
            'skill' => $skill,
        ])->with($data);
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
        $skill = Skill::findOrFail($id);
        $this->authorize('update',$skill);

        $skill->sync($request->all());
        return redirect()->route('ProfileDesigner.skill')->with('status','Updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skill = Skill::findOrFail($id);
        $this->authorize('update',$skill);
        $skill->delete();
        return redirect()->route('ProfileDesigner.skill')->with('status','delete success');
    }
}