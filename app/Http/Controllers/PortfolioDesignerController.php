<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PortfolioDesignerController extends Controller
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
        $this->authorize('viewAny',Portfolio::class);
        $portfolios =  Portfolio::where('user_id',Auth::user()->id)->get();
        @$data = array(
            'title' => 'Designer Panel | My Profile |  Portfolio',
        );
        return view('designerPanel.profilePanel.portfolioPanel.index',['portfolios'=>$portfolios])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',Portfolio::class);

        @$data = array(
            'title' => 'Designer Panel | My Profile | Portfolio - New Project',
        );
        return view('designerPanel.profilePanel.portfolioPanel.portfolioNew')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->authorize('create',Portfolio::class);

        $request->validate([
            'image'=>'required',
            'project_name'=>'required',

        ]);
        
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
               $data['user_id']= Auth::user()->id;
               Portfolio::create($data);

            }
                 //add default image
                 else {
            $image = 'images/default.jpg';
            $request->merge([
                'user_id'=>Auth::user()->id,
                'image'=>$image
            ]);        
              Portfolio::create($request->all());
            }
            return redirect()->route('ProfileDesigner.portfolio')->with('status','added success');

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
        $portfolio = Portfolio::findOrFail($id);
        $this->authorize('update',$portfolio);

        @$data = array(
            'title' => 'Designer Panel | My Profile | Portfolio - Edit Project',
        );
        return view('designerPanel.profilePanel.portfolioPanel.portfolioEdit',['portfolio'=>$portfolio])->with($data);
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
        $portfolio = Portfolio::findOrFail($id);
        $this->authorize('update',$portfolio);
        $request->validate([
            'image'=>'required',
            'project_name'=>'required',

        ]);
       

        if ($request->hasFile('image')) {
            //delete old image 
            Storage::disk('uploads')->delete($portfolio->image);
            // Filename To store
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $fileNameToStore = time(). '_'. $filenameWithExt;
            
               $file = $request->file('image');
               $image=$file->storeAs('/images',$fileNameToStore,[
                   'disk'=>'uploads'
               ]);
                $data = $request->all();
             
               $data['image'] = $image;
               $data['user_id']= Auth::user()->id;
            //  dd($data);
              $portfolio->update($data);
            }
                 //add default image
              
            return redirect()->route('ProfileDesigner.portfolio')->with('status','added success');




        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $this->authorize('update',$portfolio);
        // delete image from images folder
        Storage::disk('uploads')->delete($portfolio->image);
         Portfolio::destroy($id);
         return redirect()->route('ProfileDesigner.portfolio')->with('status','deleted success');

    }
}