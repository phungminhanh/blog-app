@extends('layouts.master')
@section('content')
    <div class="col-12 col-md-12 mt-2">
        <div class="card">
            <h5 class="card-header">Add Post</h5>
            <div class="card-body">
                <form method="post" action="{{ route('store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Teaser</label>
                        <input type="text" name="teaser" class="form-control" id="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Content</label>
                        <input type="text" name="content" class="form-control" id="">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection