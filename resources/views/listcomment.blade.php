@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Danh sách Comment</div>

                    <div class="card-body">
                        @if ($comments->isEmpty())
                            <p>Không có comment nào.</p>
                        @else
                        <h3>Comments</h3>
            <ul class="comments">
            @forelse ($comments as $comment)
    <li>
        <div class="comment-options">
            @if(Auth::check()&&Auth::user()->id!=$comment->user->id)
            <span>{{ $comment->content }} -<a href="{{ route('article', $comment->post->id) }}" class="fh5co_magna py-2">{{ $comment->post->title }} </a>- <a href="{{ route('repcomment',['id'=>$comment->user->id]) }}">{{ $comment->user ? $comment->user->user_name : 'unknown' }} </a>- {{ $comment->created_at }}</span>
            @else
            <span>{{ $comment->content }} -<a href="{{ route('article',  $comment->post->id) }}" class="fh5co_magna py-2">
            {{ $comment->post->title }} </a>- {{ $comment->user ? $comment->user->user_name : 'unknown' }} - 
            {{ $comment->created_at }}</span>
            @endif
            
                @can('deletecomment',$comment)
                <a onclick="return confirm('Are you sure?')" href="{{ route('deletecomment', ['id' => $comment->id]) }}" class="btn btn-danger">Delete</a>
                @endcan
            
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
