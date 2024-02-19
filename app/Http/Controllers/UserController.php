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
use App\Mail\DeleteAccountConfirmation;
use Illuminate\Support\Facades\Mail;
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
        
        $latestPosts = Post::whereNotNull('publish_at')->orderBy('created_at', 'desc')
                    ->orderBy('view_daily', 'desc')
                    ->take(5)
                    ->get();
                    $currentDate = Carbon::now()->toDateString();
                    $top3Posts = Post::whereNotNull('publish_at')
                    ->whereDate('daily_view_latest', $currentDate)
                    ->orderBy('view_daily', 'desc')
                    ->take(5)
                    ->get();
                  $posts = Post::whereNotNull('publish_at')->with('author')->paginate(5);
        
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
        $latestPosts = Post::whereNotNull('publish_at')->orderBy('created_at', 'desc')
        ->orderBy('view_daily', 'desc')
        ->take(5)
        ->get();
        $currentDate = Carbon::now()->toDateString();
        $top3Posts = Post::whereNotNull('publish_at')
        ->whereDate('daily_view_latest', $currentDate)
        ->orderBy('view_daily', 'desc')
        ->take(3)
        ->get();
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
      
        return view('article', compact('post','comments','commentstrashed','latestPosts','top3Posts'));
    }function article1(Request $request) {
        $latestPosts = Post::whereNotNull('publish_at')->orderBy('created_at', 'desc')
        ->orderBy('view_daily', 'desc')
        ->take(5)
        ->get();
        $currentDate = Carbon::now()->toDateString();
        $top3Posts = Post::whereNotNull('publish_at')
        ->whereDate('daily_view_latest', $currentDate)
        ->orderBy('view_daily', 'desc')
        ->take(3)
        ->get();
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
       
        return view('article', compact('post','comments','commentstrashed','top3Posts','latestPosts'));
    }
    public function create()
{
    return view('create');
}

public function store(Request $request)
{
    // Validate input
    $request->validate([
        'user_name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required|in:user,admin,editor',
    ]);

    // Create new user
    $user = new User();
    $user->user_name = $request->user_name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role = $request->role;
    $user->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'User created successfully.');
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
function listuser() {
    $users = User::all();
    return view('listuser', ['users' => $users]);
}
public function confirmDelete($id)
{
   
    $user = User::findOrFail($id);
    $user->notifications()->delete();
        $user->comments()->forceDelete();
        $user->histories()->delete();
        $posts = Post::with('comments')->where('id_author', $user->id)->get();
        foreach ($posts as $post) {
            $post->comments()->forcedelete();
        }
        $user->posts()->delete();
        $user->delete();
        return redirect()->route('listuser');
}
public function destroy(Request $request)
    {
        if (Gate::denies('admin')) {
            abort(403);
        }
      
        // Xóa người dùng và liên quan đến lịch sử comment, bài viết và thông báo
        $user =User::with('comments', 'posts', 'notifications','histories')->findOrFail($request->id);
     if ($user)
      {
        if($user->role=="admin")
        {
            Mail::to($user->email)->send(new DeleteAccountConfirmation($user));
            return redirect()->route('listuser');
        }else
        {
            
        $user->notifications()->delete();
        $user->comments()->forceDelete();
        $user->histories()->delete();
        $user->posts()->id_author = null;
        
        $user->delete();
        return dd("ds");
        return redirect()->route('listuser');
        }
        
      }
      return dd('not found');
    }

    public function updateRole(Request $request, $id)
    {
        if (Gate::denies('admin')) {
            abort(403);
        }
        // Cập nhật vai trò của người dùng
        $user = User::findOrFail($id);
        $user->update(['role' => $request->input('role')]);

        // Chuyển hướng về trang danh sách người dùng
        return redirect()->route('listuser');
    }
    public function filter(Request $request)
    {
        $role = $request->input('role');
        $created_at = $request->input('created_at');
        $user_name = $request->input('user_name');
    
        $users = User::query()
            ->when($role, function ($query, $role) {
                return $query->where('role', $role);
            })
            ->when($created_at, function ($query, $created_at) {
                return $query->whereDate('created_at', $created_at);
            })
            ->when($user_name, function ($query, $user_name) {
                return $query->where('user_name', 'like', "%{$user_name}%");
            })
            ->get();
    
        return view('listuser', compact('users'));
    }
    
    public function upload(Request $request)
    {
        $uploadedImages = $request->file('upload');

        $uploadedImageUrls = [];

        foreach ($uploadedImages as $uploadedImage) {
            $fileName = time() . '_' . $uploadedImage->getClientOriginalName();
            $uploadedImage->move(public_path('uploads/ckeditor'), $fileName);
            $url = asset('uploads/ckeditor/' . $fileName);
            $uploadedImageUrls[] = $url;
        }

        return response()->json(['uploaded' => true, 'urls' => $uploadedImageUrls]);
    }
     public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('edituser', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate input
        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|in:user,admin,editor',
        ]);

        // Find user by ID
        $user = User::findOrFail($id);

        // Update user information
        $user->user_name = $request->user_name;
    $user->email = $request->email;
    $user->role = $request->role;
    // Kiểm tra nếu password được cung cấp, thì cập nhật password mới
    if ($request->password) {
        $user->password = Hash::make($request->password);
    }
    $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'User information updated successfully.');
    }
    public function showProfile()
    {
         $user = Auth::user();;
         return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $usera = User::findOrFail($user->id);
        $usera->user_name = $request->name;
        $usera->email = $request->email;
       $usera->save();
  
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

         $user = User::findOrFail(Auth::user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
    
}