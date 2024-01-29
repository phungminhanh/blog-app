<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\History;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }
    function userCan($action, $option = null)
{
    $user = Auth::user();
    return Gate::forUser($user)->allows($action, $option);
}
    function getPost() {
        $posts = Post::paginate(5);
        return view('page', compact('posts'));
    }
    function article(Request $request) {
        $post = Post::findOrFail($request->id);   
        $comments = Comment::where('id_post', $request->id)->with('user')->get();
        $commentstrashed=Comment::where('id_post',$request->id)->onlyTrashed()->get();
        return view('article', compact('post','comments','commentstrashed'));
    }
    public function createuser(Request $request)
{
    $rules = [
        'username' => 'required|string|max:255|unique:users,user_name',
        'password' => 'required|string|',
        'email' => 'required|email|max:255|unique:users,email',
    ];
    $messages = [
        'username.unique' => 'This username is already taken.',
        'email.unique' => 'This email address is already registered.',
    ];
    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $user = new User();
    $user->user_name = $request->username;
    $user->password = Hash::make($request->password);
    $user->email = $request->email;
    $user->role = "user";
    $user->save();
    Auth::login($user);
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
    if (gate::denies('deletecomment',$comment)) {
        abort(403);
    }
    
    $comment ->delete();
   
    return redirect()->back();
}
function editcomment(Request $request) {
    
    $comment = Comment::findOrFail($request->id);
    if (gate::denies('updatecomment',$comment)) {
        abort(403);
    }
    $comment->content=$request->content;
    $comment ->update();
 
    
    return redirect()->back();
}
public function restoreComment(Request $request)
{
    $comment = Comment::withTrashed()->find($request->id);
    if (Auth::user()->id != $comment->id_user) {
        abort(403);
    }
    if ($comment) {
        $comment->restore(); 
        return redirect()->back()->with('success', 'Comment restored successfully.');
    } else {
        return redirect()->back()->with('error', 'Comment not found.');
    }
}
function forceDelete(Request $request) {
  
    $comment = Comment::withTrashed()->find($request->id);
    if (Auth::user()->id != $comment->id_user) {
        abort(403);
    }
    if ($comment) {
        $comment->forceDelete(); 
        return redirect()->back()->with('success', 'Comment restored successfully.');
    } else {
        return redirect()->back()->with('error', 'Comment not found.');
    }
  
}
}