<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\History;
use App\Models\Notification;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
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
        
        $latestPosts = Post::orderBy('created_at', 'desc')
                    ->orderBy('view_daily', 'desc')
                    ->take(3)
                    ->get();
       $top3Posts = Post::orderBy('view_daily', 'desc')
                  ->take(3)
                  ->get();
        $posts = Post::paginate(5);
        if(!Auth::check())
        {
            return view('page', compact('posts','latestPosts','top3Posts'));
        }
        $x=Auth::user()->id;
        $userUnreadNotificationsCount = Notification::where('id_user', $x)
        ->whereNotNull('id_post')
        ->whereNull('read_at')
        ->count();
        $notifications = Notification::where('id_user', Auth::user()->id)
    ->whereNotNull('id_post')
    ->whereNull('read_at')
    ->get();
   
                
        return view('page', compact('posts','userUnreadNotificationsCount','notifications','latestPosts','top3Posts'));
    }
    function article(Request $request) {
        $post = Post::findOrFail($request->id);   
        
        $comments = Comment::where('id_post', $request->id)->with('user')->get();
        $commentstrashed=Comment::where('id_post',$request->id)->onlyTrashed()->get();
        $dailyViewLatest = $post->daily_view_latest;

        $carbonDailyViewLatest = Carbon::parse($dailyViewLatest);
   
          if($post->daily_view_latest === null || !$carbonDailyViewLatest->isToday() )
          { 
          $post->view_daily=1;
           $post->daily_view_latest = now();
           $post->view =$post->view + 1;
           $post->update();
        } else{
           $post->view =$post->view + 1;
           $post->view_daily= $post->view_daily+1 ;
           $post->update();
       }
      
        return view('article', compact('post','comments','commentstrashed'));
    }function article1(Request $request) {
        $post = Post::findOrFail($request->id1);   
        $comments = Comment::where('id_post', $request->id1)->with('user')->get();
        $commentstrashed=Comment::where('id_post',$request->id1)->onlyTrashed()->get();
        $notification = Notification::findOrFail($request->id2);  
        $notification->read_at=Carbon::now();
        $notification->update();
        
         $dailyViewLatest = $post->daily_view_latest;

      $carbonDailyViewLatest = Carbon::parse($dailyViewLatest);

       if($post->daily_view_latest === null || !$carbonDailyViewLatest->isToday() )
       { 
        $view_daily=1;
        $post->daily_view_latest = now();
        $post->view =$post->view + 1;
        $post->update();
     } else{
        $post->view =$post->view + 1;
        $post->view_daily= $post->view_daily+1 ;
        $post->update();
    }
       
        return view('article', compact('post','comments','commentstrashed'));
    }
    public function createuser(Request $request)
{
    $rules = [
        'username' => 'required|string|max:255|unique:users,user_name',
        'password' => 'required|string|min:8',
        'email' => 'required|email|max:255|unique:users,email',
    ];
    $messages = [
        'username.unique' => 'This username is already taken.',
        'email.unique' => 'This email address is already registered.',
        'password.min'=>'password invalid',
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
    return redirect()->route('blog')->with('success', 'Registration successful!');
}
    function addComment(Request $request) {
        $comment = new Comment();
        if(Auth::check()){
            $validator = Validator::make($request->all(), $rules = [
                'comment' => 'required|string|max:255',
            ],  $messages = [
                'content.max' => 'comment exceeded allowed characters',
                'comment.required'=>'content not null',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        $comment->id_user = Auth::user()->id;
        $comment->id_post = $request->id;
        $comment->content = $request->comment;
        $comment->save();
        return redirect()->route('article', ['id' => $request->id])->with('success', 'Comment deleted successfully.');
    } else{
        return view('login');
    }
}
function deletecomment(Request $request) {
  
    $comment = Comment::findOrFail($request->id);
    if (gate::denies('deletecomment',$comment)) {
        abort(403);
    }  
    if ($comment) {
        $comment ->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Comment not found.');
    }
}
function editcomment(Request $request) {
    $validator = Validator::make($request->all(), $rules = [
        'content' => 'required|string|max:255',
    ],  $messages = [
        'content.max' => 'comment exceeded allowed characters',
        'content.required'=>'content not null',
    ]);
    $comment = Comment::findOrFail($request->id);
    if (gate::denies('updatecomment',$comment)) {
        abort(403);
    }
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    if ($comment) {
        $comment->content=$request->content;
        $comment ->update();
        return redirect()->back()->with('success', 'Comment updated successfully.');
    } else {
        $validator->errors()->add('not_found', 'Comment not found.');
        return redirect()->back()->withErrors($validator)->withInput();
    }
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
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    } else {
        return redirect()->back()->with('error', 'Comment not found.');
    }
  
}
function repComment(Request $request)
{
    $user = User::findOrFail($request->id);
    
    return redirect()->back()->with('userneedrep',$user);
}
function rep(Request $request)
{
    $user = User::findOrFail($request->idUser);
    $comment = new Comment();

    $notification=new Notification();
    $notification->id_user=$request->idUser;
    $notification->content ="[".$user->user_name."]: " . $request->comment;
    $comment->content=  $notification->content;
    $comment->id_post=$request->idPost;
    $comment->id_user=Auth::user()->id;
    $comment->save();
    $notification->id_post=$comment->id_post;
    $notification->save();
    return redirect()->back();
}

}