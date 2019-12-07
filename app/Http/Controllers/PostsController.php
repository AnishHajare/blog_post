<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }


    public function index()
    {
        $posts = Post::latest()
                ->filter(request()->only(['month','year']))
                ->get();

        $archives = Post::archives();
        //return $archives;

        return view('posts/index',compact('posts'));
    }


    public function show(Post $post)
    {
        return view('posts/show',compact('post'));
    }


    public function create()
    {
        return view('views/posts/create');
    }

    public function store()
    {
        //Create a new post using requst data
        $this->validate(request(), [


            'title' => 'required|min:3',
            'body' => 'required'
        ]);

        auth()->user()->publish(
            new Post(request(['title','body'])));


        //Save it to the database
        //And then redirect to the home page
        return redirect('/');

    }
}
