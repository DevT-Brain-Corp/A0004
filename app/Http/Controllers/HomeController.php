<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
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
        $posts = Post::orderby('id', 'DESC')->get();
        // $posts = [];
        // foreach ($post as $p) {
        //   $temp = [];
        //   $temp['comments'] = Comment::where('post_id', $p->id)->get();
        //   $temp['post'] = $p;
        //   $posts[] = $temp;
        // }
        return view('home', compact('posts'));
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

    public function update(Request $request, $id)
    {
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $id;
        $comment->save();
        return back();
    }


}
