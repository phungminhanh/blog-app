@extends('layouts.master')
@section('content')
    <div class="col-12 col-md-12 mt-2">
        <div class="card">
            <h5 class="card-header">Post Update</h5>
            <div class="card-body">
                <form method="post" action="{{ route('update', $post->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" value="{{ $post->title }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Teaser</label>
                        <input type="text" name="teaser" value="{{ $post->teaser }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Content</label>
                        <input type="text" name="content" value="{{ $post->content }}" class="form-control">
                    </div>
                    <div class="mb-3">
                    <label for="image">@if($post->thumbnail)
                <div class="thumbnail-container">
                    <img class="thumbnail-img" src="{{ asset('storage/' . $post->thumbnail) }}" alt="Ảnh sản phẩm">
                </div>
            @endif</label>
                  <input type="file" name="image" id="image">
          </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Accept</button>
                </form>
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
            </div>
        </div>
    </div>

@endsection