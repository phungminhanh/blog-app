<!-- Trong file article.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Website</title>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Responsive Navbar with Submenu</title>
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
        /* Styles here */
        .comment-options {
            display: flex;
            align-items: center;
        }

        .edit-btn,
        .delete-btn {
            margin-left: 10px;
            padding: 5px 10px;
            cursor: pointer;
            border: none;
            color: #fff;
            border-radius: 5px;
        }

        .edit-btn {
            background-color: #3498db;
        }

        .delete-btn {
            background-color: #e74c3c;
        }

        .edit-form {
            display: none;
            margin-top: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }
    </style>

    <!-- JavaScript -->
    <script>
        function showEditForm(commentId) {
            const editForm = document.getElementById(`editForm_${commentId}`);

            // Nếu form không tồn tại, không làm gì cả
            if (!editForm) {
                return;
            }

            // Kiểm tra trạng thái hiện tại của form
            const isHidden = editForm.style.display === 'none' || editForm.style.display === '';

            // Đảo ngược trạng thái hiển thị của form
            editForm.style.display = isHidden ? 'block' : 'none';
        }
    </script>
</head>

<body>
    <!-- Header Section -->
    <header>
        <h1>Welcome to My Website</h1>
        <a class="nav-link active" aria-current="page" href="{{ route('blog')}}">Home</a>
    </header>

    <!-- Main Content Section -->
    <section>
        @if(Auth::check())
            <p>Xin chào, {{ Auth::user()->name }}</p>
        @else
            <p>Chào mừng bạn đến với trang web!</p>
        @endif
        <div>
            <h2>{{ $post->title }}</h2>
            <p>Teaser: {{ $post->teaser }}</p>
            <p>Content: {{ $post->content }}</p>
            <p>Author: {{ $post->author->stagename }}</p> 
            <p>create at: {{$post->created_at}}</p>
            
            <h3>Comments</h3>
            <ul class="comments">
            @forelse ($comments as $comment)
    <li>
        <div class="comment-options">
            @if(Auth::check()&&Auth::user()->id!=$comment->user->id)
            <span>{{ $comment->content }} - <a href="{{ route('repcomment',['id'=>$comment->user->id]) }}">{{ $comment->user ? $comment->user->user_name : 'unknown' }} </a>- {{ $comment->created_at }}</span>
            @else
            <span>{{ $comment->content }} - {{ $comment->user ? $comment->user->user_name : 'unknown' }} - {{ $comment->created_at }}</span>
            @endif
               @can('updatecomment',$comment)
                <button class="edit-btn" onclick="showEditForm('{{ $comment->id }}');">Edit</button>
                @endcan
                @can('deletecomment',$comment)
                <a onclick="return confirm('Are you sure?')" href="{{ route('deletecomment', ['id' => $comment->id]) }}" class="btn btn-danger">Delete</a>
                @endcan
            
        </div>
        <div class="edit-form" id="editForm_{{ $comment->id }}">
            <form method="post" action="{{ route('editcomment', ['id' => $comment->id]) }}">
                @csrf
               
                <textarea name="content" rows="2" cols="50">{{ $comment->content }}</textarea>
                <button type="submit">Update</button>
            </form>
        </div>
    </li>
@empty
    <li>No comments yet.</li>
@endforelse
@if(session('error'))
    <div class="alert alert-danger" id ='message'>
        {{ session('error') }}
    </div>
@endif




            </ul>
        </div>
        @if(session('userneedrep'))
        
        <div class="comment-form">
   
            <h3>Add a Comment</h3>
            <form method="post" action="{{ route('rep', ['idUser'=>session('userneedrep')->id , 'idPost'=>$post->id]) }}">
                @csrf
                <textarea name="comment" placeholder="{{session('userneedrep')->user_name }} :" rows="4" cols="50"></textarea><br>
                <button type="submit">Submit</button>
                </form>
                </div>
       @else
        <div class="comment-form">
            <h3>Add a Comment</h3>
            <form method="post" action="{{ route('addcomment', $post->id) }}">
                @csrf
                <textarea name="comment" placeholder="Type your comment here" rows="4" cols="50"></textarea><br>
                <button type="submit">Submit</button>
                </form>
                </div>
        @endif
                @if($errors->any())
    <div class="alert alert-danger" id ='message' style="display: flex; justify-content: space-between;">
        <ul>
            @foreach ($errors->all() as $error)

                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success" id ='message'>
        {{ session('success') }}
    </div>
   
@endif
<script>
        // Automatically close the error message after 3 seconds
        setTimeout(function()  {
            var Message = document.getElementById('message');
               Message.style.transition = 'opacity 1.5s'; 
                Message.style.opacity = '0';
            }, 1500);;
    </script>
           
        
        <ul>
            
        @foreach($commentstrashed as $commenttrashed)
        
            @if(Auth::check() && Auth::user()->id == $commenttrashed->id_user)
            <li>  
             <span> your hidden comment delete at {{$commenttrashed->deleted_at}}</span>            
               
                <a href="{{ route('restoreComment', ['id' => $commenttrashed->id]) }}" class="btn btn-success">Restore</a>
                <a href="{{ route('forceDelete', ['id' => $commenttrashed->id]) }}" class="btn btn-success">forcedelete</a>
                </li>
                @endif
            
         @endforeach
            
            </ul>
    </section>

    <!-- Footer Section -->
</body>



    <!-- Footer Section -->


</html>
