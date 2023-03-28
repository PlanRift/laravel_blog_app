<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::check()) {
            return redirect('login');
        }

        $posts = Post::active()
            ->get();

        $data = [
            'posts' => $posts
        ];
        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $title = $request->input('title');
        $content = $request->input('content');

        Post::create([
            'title' => $title,
            'content' => $content,
        ]);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $selected_post = Post::where('slug', $slug)->first();



        $data = [
            'post' => $selected_post
        ];


        return view('posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $selected_post = Post::where('slug', $slug)->first();

        $data = [
            'post' => $selected_post
        ];


        return view('posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $title = $request->input('title');
        $content = $request->input('content');

        // ? "UPDATE .... Where id = $id"
        Post::where('slug', $slug)
            ->update([
                'title' => $title,
                'content' => $content,
            ]);

        return redirect("posts/{$slug}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        Post::selectById($id)
            ->delete();

        return redirect('posts');
    }

    public function trash()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $trash_item = Post::onlyTrashed()->get();

        $data = [
            'posts' => $trash_item
        ];

        return view('posts.recyclebin', $data);
    }
}
