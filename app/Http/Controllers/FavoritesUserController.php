<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\ChallengeWork;
use App\Models\Favorite;
use App\Models\FavoriteDesigner;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritesUserController extends Controller
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
      // $challenges = Auth::user()->favorites[0]->challenge->works;
       $favorites = Auth::user()->favorites;
      //  dd($challenges);
        @$data = array(
            'title' => 'User Panel | My Favorites',
        );
        
        return view('userPanel.favoritesPanel.index',['favorites'=>$favorites])->with($data);
    }

    
    public function addToFavorite($id)
    {
      $fav=   FavoriteDesigner::where([
            'user_id'=>Auth::id(),
            'designer_id'=>$id,
        ])->first();
        if ($fav) {
           
        } else {
            FavoriteDesigner::create([
                'user_id'=>Auth::id(),
                'designer_id'=>$id,
            ]);
        }
        
    

       return redirect()->route('designersPage')->with('success','Added to favorite success');
       
    }

    public function removeFromFavorite($id)
    {
       FavoriteDesigner::destroy($id);

       return redirect()->route('MyFavoritesDesigners')->with('success','removed from favorite success');
       
    }


    public function Designers()
    {
        $favorites = FavoriteDesigner::where('user_id',Auth::id())->get();
        @$data = array(
            'title' => 'User Panel | My Favorites Designers',
        );
        
        return view('userPanel.favoritesPanel.designers',['favorites'=>$favorites])->with($data);
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