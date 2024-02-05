@extends('layouts.master')
@section('content')
    <div class="col-12 col-md-12 mt-2">
        <div class="card">
            <h5 class="card-header">Posts</h5>
            <div class="card-body">
                <div class="col-6">
                    <form class="navbar-form navbar-left" method="GET" action="{{ route('search') }}">
                        @csrf
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    <input type="text" name="keyword" class="form-control" placeholder="Search">
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">teaser</th>
                        <th scope="col">author</th>
                        <th scope="col">created_at</th>
                        <th scope="col">updated_at</th>
                        
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $index => $post)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->teaser }}</td>
                            <td>{{$post->author->stagename}}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                           
                            <td>
                                <a onclick="return confirm('Are you sure?')" href="{{ route('delete', $post->id) }}" class="btn btn-danger">Delete</a>
                                <a onclick="return confirm('Are you sure?')" href="{{ route('publish', $post->id) }}" class="btn btn-primary">publish</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    @if($errors->any())
        <div class="popup alert alert-danger" id="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('success'))
        <div class="popup alert alert-success" id="success1-message">
            {{ session('success') }}
        </div>
    @endif 
    @if(session('error'))
        <div class="popup alert alert-success" id="success-message">
            {{ session('error') }}
        </div>
    @endif 

    <!-- Include jQuery or any other JavaScript library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- Your custom JavaScript code -->
    <script>
        // Display pop-up on page load
        $(document).ready(function(){
            $("#error-message, #success-message, #success1-message").fadeIn().delay(3000).fadeOut();
        });
    </script>

                </table>
                {{ $posts->appends(request()->query()) }}
            </div>
        </div>
    </div>

@endsection