<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Blog;
use App\Models\SlideShow;
use App\Models\SocialMedia;
use App\Models\TermsAndPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GeneralSettingsController extends Controller
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
        $blogs = Blog::get();
        $aboutus = AboutUs::first(); 
        $slides = SlideShow::get();
        $terms = TermsAndPolicy::get();
        $socials = SocialMedia::get();
        @$data = array(
            'title' => 'Admin Panel | General Settings',
        );
        
        return view('adminPanel.generalPanel.index',['blogs'=>$blogs,'slides'=>$slides,'terms'=>$terms,'socials'=>$socials,'aboutus'=>$aboutus])->with($data);
    }

    public function slideShow(Request $request)
    {
        $request->validate([
            'image'=>'required',
            'artitle'=>'required',
            'color'=>'required',
            'description'=>'required',
            'link'=>'required',
            'entitle'=>'required',

        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
           
            // Filename To store
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $fileNameToStore = time(). '_'. $filenameWithExt;
            
               $file = $request->file('image');
               $image=$file->storeAs('/images',$fileNameToStore,[
                   'disk'=>'uploads'
               ]);
                $data = $request->all();
              /*  $request->merge([
                   'user_id'=>Auth::user()->id,
                   'image'=>$image
               ]); */
               $data['image'] = $image;
               $data['admin_id']= Auth::user()->id;
            
            }
          //  dd($data);

            SlideShow::create($data);

        return redirect()->route('generalSettings')->with('success','slid added suceess');
    }
    
        public function deleteslide($id)
        {
            $slide = SlideShow::find($id);
            Storage::disk('uploads')->delete($slide->image);
            SlideShow::destroy($id);
            return redirect()->route('generalSettings')->with('success','slid deleted suceess');

        }
        
    public function termsandpolicy(Request $request)
    {
        $request->validate([
           
            'endes'=>'required',
            'ardes'=>'required',

        ]);
        $data = $request->all();
        $data['admin_id']= Auth::id();
        TermsAndPolicy::create($data );
        return redirect()->route('generalSettings')->with('success','terms and policy added suceess');

    }

    public function updateterms(Request $request,$id)
    {
        $term = TermsAndPolicy::find($id);
        $request->validate([
           
            'endes'=>'required',
            'ardes'=>'required',

        ]);
        $data = $request->all();
        $term->update($data);   
             return redirect()->route('generalSettings')->with('success','terms and policy updated suceess');
    }

    
    public function socialmedia(Request $request)
    {

        $request->validate([
            'image'=>'required',
            'title'=>'required',
            'link'=>'required',
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
           
            // Filename To store
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $fileNameToStore = time(). '_'. $filenameWithExt;
            
               $file = $request->file('image');
               $image=$file->storeAs('/images',$fileNameToStore,[
                   'disk'=>'uploads'
               ]);
                $data = $request->all();
              /*  $request->merge([
                   'user_id'=>Auth::user()->id,
                   'image'=>$image
               ]); */
               $data['image'] = $image;
               $data['admin_id']= Auth::user()->id;
            
            }
          //  dd($data);

            SocialMedia::create($data);
        
        return redirect()->route('generalSettings')->with('success','terms and policy updated suceess');

    }



    public function deletesocialmedia($id)
    {
        $social = SocialMedia::find($id);
        Storage::disk('uploads')->delete($social->image);
        SocialMedia::destroy($id);
      
        
        return redirect()->route('generalSettings')->with('success','terms and policy deleted suceess');

    }

    public function aboutus( Request $request)
    {
       
        $request->validate([
           
            'enbody'=>'required',
            'arbody'=>'required',

        ]);
        $about = AboutUs::get();
        if (count($about)>0) {
            $about = AboutUs::first();
            $about->update([
                'arbody'=>$request->arbody,
                'enbody'=>$request->enbody,
            ]
            );
        } else {
            AboutUs::create([
                'arbody'=>$request->arbody,
                'enbody'=>$request->enbody,    
            ]);
        }
        
        return redirect()->route('generalSettings')->with('success','About us updated suceess');

    }

    public function addblog(Request $request)
    {
        $request->validate([
           
            'entitle'=>'required',
            'artitle'=>'required',
            'image'=>'required',
            'ardescription'=>'required',
            'endescription'=>'required',

        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
           
            // Filename To store
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $fileNameToStore = time(). '_'. $filenameWithExt;
            
               $file = $request->file('image');
               $image=$file->storeAs('/images',$fileNameToStore,[
                   'disk'=>'uploads'
               ]);
                $data = $request->all();
              /*  $request->merge([
                   'user_id'=>Auth::user()->id,
                   'image'=>$image
               ]); */
               $data['image'] = $image;
               $data['admin_id']= Auth::user()->id;
            
            }
          //  dd($data);

            Blog::create($data);
        return redirect()->route('generalSettings')->with('success','blog added success suceess');

    }
    public function updateblog(Request $request,$id)
    {
        $request->validate([
           
            'entitle'=>'required',
            'artitle'=>'required',
            'ardescription'=>'required',
            'endescription'=>'required',

        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
           
            // Filename To store
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $fileNameToStore = time(). '_'. $filenameWithExt;
            
               $file = $request->file('image');
               $image=$file->storeAs('/images',$fileNameToStore,[
                   'disk'=>'uploads'
               ]);
                $data = $request->all();
              /*  $request->merge([
                   'user_id'=>Auth::user()->id,
                   'image'=>$image
               ]); */
               $data['image'] = $image;
            
            }
          //  dd($data);
            $blog = Blog::find($id);
            $blog->update($data);
        return redirect()->route('generalSettings')->with('success','blog updated success suceess');

    }

    public function deleteblog($id)
    {
        $social = Blog::find($id);
        Storage::disk('uploads')->delete($social->image);
        Blog::destroy($id);
      
        
        return redirect()->route('generalSettings')->with('success','blog deleted suceess');
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