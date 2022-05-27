<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;
use App\Models\AboutDesigner;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Packages;
use App\Models\Portfolio;
use App\Models\Programer;
use App\Models\Skill;
use App\Models\WorkingHours;
use Illuminate\Support\Facades\Auth;

class ProfileDesignerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function about()
    {
        $about =AboutDesigner::where('user_id',Auth::user()->id)->first();
        $portfolios = Portfolio::where('user_id',Auth::user()->id)->limit(3)->get();
        $educationes = Education::where('user_id',Auth::user()->id)->get();
        $experinces = Experience::where('user_id',Auth::user()->id)->get();
        $skills = Skill::where('user_id',Auth::user()->id)->get();
        $programes = Programer::where('user_id',Auth::user()->id)->get();
        $hours = WorkingHours::where('user_id',Auth::user()->id)->first();
        $packages = Packages::with(['designers'=>function($q)
        {
            $q->where('designer_id',Auth::id());
        }])->get();
       // dd($packages[2]->designers['type']);
        @$data = array(
            'title' => 'Designer Panel | My Profile',
        );
        return view('designerPanel.profilePanel.aboutPanel.about',[
            'about' => $about,
            'portfolios'=>$portfolios,
            'educationes'=>$educationes,
            'experinces'=>$experinces,
            'skills'=>$skills,
            'programes'=>$programes,
            'hours'=>$hours,
            'packages'=>$packages
            ])
            ->with($data);
    }

    public function education()
    {
        /*
        $educations =Education::where('user_id',Auth::user()->id)->get();

        @$data = array(
            'title' => 'Designer Panel | My Profile | Education',
        );
        return view('designerPanel.profilePanel.aboutPanel.education',[
            'educations'=>$educations,
        ])->with($data);
        */
    }

    public function experience()
    { /*
        $experinces  =Experience::where('user_id',Auth::user()->id)->get();

        @$data = array(
            'title' => 'Designer Panel | My Profile | Experience',
        );
        return view('designerPanel.profilePanel.aboutPanel.experience',['experinces'=>$experinces])->with($data);
        */
    }

    public function skill()
    {/*
        @$data = array(
            'title' => 'Designer Panel | My Profile | Skills',
        );

        $skills = Skill::where('user_id',Auth::user()->id)->get();
        return view('designerPanel.profilePanel.aboutPanel.skill',[
            'skills' => $skills
        ])->with($data);
        */
    }

    public function program()
    {/*
        @$data = array(
            'title' => 'Designer Panel | My Profile | Programs',
        );
        $programes = Programer::where('user_id',Auth::user()->id)->get();    
          return view('designerPanel.profilePanel.aboutPanel.program',['programes'=>$programes])->with($data);
          */
    }

    public function workinghour()
    {/*
        @$data = array(
            'title' => 'Designer Panel | My Profile | Working hours',
        );
        $hours = WorkingHours::where('user_id',Auth::user()->id)->get();
        return view('designerPanel.profilePanel.aboutPanel.workingHours',['hours'=>$hours])->with($data);
        */
    }

    public function portfolio()
    {/*
        $portfolios =  Portfolio::where('user_id',Auth::user()->id)->get();
        @$data = array(
            'title' => 'Designer Panel | My Profile |  Portfolio',
        );
        return view('designerPanel.profilePanel.portfolioPanel.index',['portfolios'=>$portfolios])->with($data);
        */
    }
}