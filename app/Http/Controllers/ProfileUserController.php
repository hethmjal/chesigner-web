<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $packages = Packages::get();
        @$data = array(
            'title' => 'User Panel | My Profile',
        );
        return view('userPanel.profilePanel.aboutPanel.about',['packages'=>$packages])->with($data);
    }

    public function profileavatar()
    {
        @$data = array(
            'title' => 'User Panel | My Profile | Profile avatar - Change images',
        );
        return view('userPanel.profilePanel.aboutPanel.profileAvatar')->with($data);
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

               $data[''] = $image;
               
            }
            $user->update($data);
            return redirect()->route('user.about')->with('status','updated success');

    }
}