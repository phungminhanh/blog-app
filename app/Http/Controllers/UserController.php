<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\History;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function getPost() {
        $posts = Post::paginate(5);
        return view('page', compact('posts'));
    }
    function article(Request $request) {
        $post = Post::findOrFail($request->id);   
        $comments = Comment::where('id_post', $request->id)->with('user')->get();
        return view('article', compact('post','comments'));
    }
    function createuser(Request $request)
    {
        $user = new User();
        $user->user_name=$request->username;
        $user->password = Hash::make($request->password);
        $user->role="user";
        $user->save();
        Auth::login($user);

        // Chuyển hướng về trang mong muốn sau khi đăng ký
        return redirect()->route('blog');
    }
    function addComment(Request $request) {
        $comment = new Comment();
        if(Auth::check()){
        $comment->id_user = Auth::user()->id;
        $comment->id_post = $request->id;
        $comment->content = $request->comment;
        $comment->save();
       
        return redirect()->route('article', ['id' => $request->id]);
    } else{
        return view('login');
    }
}
function deletecomment(Request $request) {
    $comment = Comment::findOrFail($request->id);
    $id=$comment->id_post;
    $comment ->delete();
   
    return redirect()->route('article', ['id' =>$id]);
}
function editcomment(Request $request) {
    $comment = Comment::findOrFail($request->id);
    $comment->content=$request->content;
    $comment ->update();
    $idpost=$comment->id_post;
    
    return redirect()->route('article', ['id' =>$idpost]);
}
}