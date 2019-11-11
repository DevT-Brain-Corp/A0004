<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::orderby('id', 'DESC')->get();


        return view('home', compact('post'));
    }

    public function store(Request $request)
    {
      $post = new Post;
      $post->user_id = Auth::user()->id;
      $post->content = $request->content;
      $post->status = 0;

      $post->save();

      return back();
    }


}
