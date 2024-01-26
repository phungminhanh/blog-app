@extends('layouts.master')
@section('content')
    <div class="col-12 col-md-12 mt-2">
        <div class="card">
            <h5 class="card-header">Post Update</h5>
            <div class="card-body">
                <form method="post" action="{{ route('update', $post->id) }}">
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
                    
                    </div>
                    <button type="submit" class="btn btn-primary">Accept</button>
                </form>
            </div>
        </div>
    </div>

@endsection