@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Chi tiết Bài viết</div>

                    <div class="card-body">
                        <!-- Hiển thị chi tiết bài viết -->
                        <h2>{{ $post->title }}</h2>
                      
                    <article  id="post-content" >
                        {!!$post->content!!}
                    </article>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
