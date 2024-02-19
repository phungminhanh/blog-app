<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\History;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    function index() {
        $posts = Post::with('author')->paginate(5);
     
        return view('adminboard', compact('posts'));
    }
    function listcomment() {
        $comments = Comment::with('post', 'user')->get();
        $commentstrashed=Comment::onlyTrashed()->get();
  
        return view('listcomment', compact('comments','commentstrashed'));
    }
    function Histories() {
        $histories = History::paginate(10);
        return view('histories', compact('histories'));
    }
    function store(Request $request) {
        $post = new Post();
        
        $rules = [
            'title' => 'required|string|max:255',
            'teaser' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Thêm validation cho ảnh
        ];
    
        // Tạo các thông báo lỗi tùy chọn
        $messages = [
            'title.required' => 'Tiêu đề không được để trống.',
            'teaser.required' => 'Mô tả ngắn không được để trống.',
            'content.required' => 'Nội dung không được để trống.',
            'image.required' => 'Vui lòng chọn một hình ảnh.',
            'image.image' => 'File phải là hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg hoặc gif.',
            'image.max' => 'Dung lượng hình ảnh không được vượt quá 2MB.',
        ];
    
        // Kiểm tra validation
        $validator = Validator::make($request->all(), $rules, $messages);
    
        // Nếu có lỗi validation
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
      
        

        if ($request->hasFile('image')) {
            $postTitle = $request->title;
            $PostImagePath = 'public/products/' .  $postTitle;

   
         if (!Storage::exists( $PostImagePath)) {
        Storage::makeDirectory( $PostImagePath);
    }

   
        $imagePath = $request->file('image')->store( $PostImagePath, 'public');
            
            $post->thumbnail = $imagePath;
          
         
        }
        $post->content = $request->content;
        $post->title = $request->title;
        $post->teaser = $request->teaser;
        if (Auth::check()) {
           
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
        if (Gate::denies('deletePost')) {
            abort(403);
        }
        $post = Post::findOrFail($request->id);
        Comment::where('id_post', $request->id)->forceDelete();

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
        $id = $request->input('id');

       
        if ($id) {
            abort(403, 'Không được phép sửa đổi ID.');
        }
        if (Gate::denies('deletePost')) {
            abort(403);
        }
        $post = Post::findOrFail($request->id);
       if ($request->hasFile('image')) {
        // Xóa ảnh cũ
        Storage::disk('public')->delete($post->thumbnail);
      
            $postTitle = $request->title;
            $PostImagePath = 'public/products/' .  $postTitle;

   
         if (!Storage::exists( $PostImagePath)) {
        Storage::makeDirectory( $PostImagePath);
    }

   
        $imagePath = $request->file('image')->store( $PostImagePath, 'public');
            
            $post->thumbnail = $imagePath;
        
    }
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
        $posts = Post::whereNull('publish_at')->paginate(10);

        return view('yourpost', compact('posts'));
        
    } 
    function publish(Request $request) {
       
        $post = Post::findOrFail($request->id);

        if ($post) {
            $post->publish_at= now(); 
            $post->save();
       
            return redirect()->back()->with('success', ' successfully.');
        } else {
            return redirect()->back()->with('error', 'post not found.');
        }
        
    }
    function unpublish(Request $request) {
       
        $post = Post::findOrFail($request->id);

        if ($post) {
            $post->publish_at= null; 
            $post->save();
       
            return redirect()->back()->with('success', ' successfully.');
        } else {
            return redirect()->back()->with('error', 'post not found.');
        }
        
    }
   
    function deleteSelected(Request $request)
    {
        $x="d";
        
        if (Gate::denies('deletePost')) {
            abort(403);
        }
    
        $selectedPosts = $request->get('selectedPosts', []);
        
        foreach ($selectedPosts as $postId) {
            $post = Post::findOrFail($postId);
            Comment::where('id_post', $postId)->forceDelete();
          
            $history = new History();
            $history->id_post = $post->id;
            $history->id_admin = Auth::id();
            $history->status = "delete";
            $history->save();
    
            $post->delete();
            
        }
    
        return redirect()->route('index')->with('success', 'Bài viết đã được xóa thành công.');
    }
    public function show($id)
{
    $post = Post::findOrFail($id);
    return view('show', compact('post'));
}
}