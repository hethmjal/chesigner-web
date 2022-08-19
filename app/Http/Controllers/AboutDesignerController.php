<?php

namespace App\Http\Controllers;

use App\Models\AboutDesigner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class AboutDesignerController extends Controller
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
        // get random number

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $about = AboutDesigner::where('user_id',Auth::user()->id)->first();
        @$data = array(
            'title' => 'Designer Panel | My Profile | About - New About',
            'about'=>$about
        );
        return view('designerPanel.profilePanel.aboutPanel.aboutNew')->with($data);
    }

    public function profileavatar()
    {
        @$data = array(
            'title' => 'Designer Panel | My Profile | Profile avatar - Change images',
        );
        return view('designerPanel.profilePanel.aboutPanel.profileAvatar')->with($data);
    }
    public function addavatar(Request $request)
    {
        $data = [];
        $user = Auth::user();
        if ($request->hasFile('image')) {

            // Filename To store
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $fileNameToStore = time(). '_'. $filenameWithExt;

               $file = $request->file('image');
               $image=$file->storeAs('/images',$fileNameToStore,[
                   'disk'=>'uploads'
               ]);
               Storage::disk('uploads')->delete($user->profile_photo_path);

               $data['profile_photo_path'] = $image;

            }

              if ($request->hasFile('background')) {

            // Filename To store
            $filenameWithExt = $request->file('background')->getClientOriginalName ();
            $fileNameToStore = time(). '_'. $filenameWithExt;

               $file = $request->file('background');
               $image=$file->storeAs('/images',$fileNameToStore,[
                   'disk'=>'uploads'
               ]);
               Storage::disk('uploads')->delete($user->background_photo_path);

               $data['background_photo_path'] = $image;


            }
            $user->update($data);
            return redirect()->route('profiledesignerresource.about')->with('status','updated success');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'body'=>'required',
        ]);
        $request->merge([
            'user_id' =>  Auth::user()->id
        ]);
        AboutDesigner::updateOrCreate(['user_id'=>Auth::user()->id],['body'=>$request->body]);
        return redirect()->route('profiledesignerresource.about')->with('status','updated success');
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
        $about = AboutDesigner::where('user_id',Auth::user()->id)->first();
        $about->delete();
    }



    //function to destroy user
    public function destroyuser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('profiledesignerresource.about')->with('status','deleted success');
    }
    //function to get user ccountry by ip address

    public function getUserCountry()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
        return $details->country;
    }










}
