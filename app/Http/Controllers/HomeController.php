<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Skill;
use App\Models\AboutUs;
use App\Models\Packages;
use App\Models\Education;
use App\Models\Portfolio;
use App\Models\Programer;
use App\Models\SlideShow;
use App\Models\Experience;
use App\Models\WorkingHours;
use Illuminate\Http\Request;
use App\Models\AboutDesigner;
use App\Models\Blog;
use App\Models\DesignerPackage;
use App\Models\TermsAndPolicy;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $slides= SlideShow::get();
        @$data = array(
            'title' => 'Homepage | الصفحة الرئيسية',
        );
        return view('home.index',['slides'=>$slides])->with($data);
    }

    public function aboutus()
    {
        $about = AboutUs::first();

        @$data = array(
            'title' => ' About Us | من نحن',
        );
        return view('home.aboutus',['about'=>$about])->with($data);
    }

    public function blog()
    {
        $blogs = Blog::get();
        @$data = array(
            'title' => ' Blog | المدونة',
        );
        return view('home.blog',['blogs'=>$blogs])->with($data);
    }

    public function showblog($id)
    {
        $blog = Blog::findOrFail($id);

        @$data = array(
            'title' => " Blog | المدونة | $id",
        );
        return view('home.showBlog',['blog'=>$blog])->with($data);
    }

    public function oldindex()
    {
        @$data = array(
            'title' => ' Homepage Arabic',
        );
        return view('home.index')->with($data);
    }

    public function challengesPage()
    {
        @$data = array(
            'title' => ' Challenges ',
        );
        return view('challenges.challenges')->with($data);
    }

    public function designersPage()
    {
        $designers = User::where('type','designer')->paginate(2);
        @$data = array(
            'title' => ' Designers ',
        );
        return view('designers.designers',['designers'=>$designers])->with($data);
    }

    public function readyWorksPage()
    {
        @$data = array(
            'title' => ' Ready Works ',
        );
        return view('worksForSale.readyWorks')->with($data);
    }

    public function contactUsPage()
    {
        @$data = array(
            'title' => ' Contact Us ',
        );
        return view('contactUs.contactUs')->with($data);
    }

    public function signInPage()
    {
        @$data = array(
            'title' => ' Sign In ',
        );
        return view('auth.signin')->with($data);
    }

    public function signUpPage()
    {
        @$data = array(
            'title' => ' Sign Up ',
        );
        return view('auth.signup')->with($data);
    }

    public function challengeFormPage()
    {
        @$data = array(
            'title' => ' Challenge Form ',
        );
        return view('clientForms.challengeForm')->with($data);
    }

    public function directOrderPage()
    {
        @$data = array(
            'title' => ' Direct Order Form ',
        );
        return view('clientForms.directOrderForm')->with($data);
    }

    public function viewDesigner($id)
    {
        $user = User::findOrFail($id);
        $packages = DesignerPackage::with('package')->where('designer_id',$user->id)->get();
       // dd($packages[0]->package->name);
        $about =AboutDesigner::where('user_id',$id)->first();
        $portfolios = Portfolio::where('user_id',$id)->limit(3)->get();
        $educationes = Education::where('user_id',$id)->get();
        $experinces = Experience::where('user_id',$id)->get();
        $skills = Skill::where('user_id',$id)->get();
        $programes = Programer::where('user_id',$id)->get();
        $hours = WorkingHours::where('user_id',$id)->first();
        @$data = array(
            'title' => ' Direct Order Form ',
        );
        return view('designers.viewDesigner',[
            'user'=>$user,
            'about' => $about,
            'portfolios'=>$portfolios,
            'educationes'=>$educationes,
            'experinces'=>$experinces,
            'skills'=>$skills,
            'programes'=>$programes,
            'hours'=>$hours,
            'packages'=>$packages,
            ])->with($data);
    }



    public function terms()
    {
        $terms = TermsAndPolicy::get();
        return view('terms',['terms'=>$terms]);
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
