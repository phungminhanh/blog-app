<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\History;
use Illuminate\Http\Request;
class PostController extends Controller
{
    function index() {
        $posts = Post::with('author')->paginate(5);
        return view('adminboard', compact('posts'));
    }
    function Histories() {
        $histories = History::paginate(10);
        return view('histories', compact('histories'));
    }
    function store(Request $request) {
        $post = new Post();
        $post->content = $request->content;
        $post->title = $request->title;
        $post->teaser = $request->teaser;
        if (Auth::check()) {
            // Người dùng đã đăng nhập
            $userId = Auth::id();
            $post->id_author= $userId;
        } 
        $post->save();
        $history = new History();
        $history->id_post = $post->id;
        $history->id_admin = Auth::id();
        $history->status = "add";
        $history->save();
        return redirect()->route('index');
        
        

    }
    function add(Request $request) {
      
        return view('add');
    }
    function delete(Request $request) {
        $post = Post::findOrFail($request->id);
        $history = new History();
        $history->id_post = $post->id;
        $history->id_admin = Auth::id();
        $history->status = "delete";
        $history->save();
        $post->delete();
        return redirect()->route('index');
    }
    function edit(Request $request) {
        $post = Post::findOrFail($request->id);   
        return view('edit', compact('post'));
    }

    function update(Request $request) {
        $post = Post::findOrFail($request->id);
        $post->content = $request->content;
        $post->title = $request->title;
        $post->teaser = $request->teaser;
        $history = new History();
        $history->id_post = $post->id;
        $history->id_admin = Auth::id();
        $history->status = "update";
        $history->save();
        $post->save();
        return redirect()->route('index');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if (!$keyword) {
            return redirect()->route('adminboard.index');
        }
        $posts = Post::where('title', 'LIKE', '%' . $keyword . '%')->with('author')->paginate(3);
       
        return view('adminboard', compact('posts'));
    }
    function PostbyAuthor() {
        $posts = Post::where('id_author', Auth::id())->paginate(5);

        return view('yourpost', compact('posts'));
        
    }
}