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
         <form id="deleteForm" action=" {{route('deleteSelected')}}" method="POST">
         @csrf


        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa các bài viết đã chọn không?')">Xóa Đã Chọn</button>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">
                        <input type="checkbox" id="selectAllCheckbox" onchange="toggleCheckboxes()"  onclick="selectAll()">
                    </th>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">teaser</th>
                    <th scope="col">created_at</th>
                    <th scope="col">updated_at</th>
                    <th scope="col">author</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $index => $post)
                    <tr>
                        <td><input type="checkbox" name="selectedPosts[]" value="{{ $post->id }}"></td>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td><a href="{{ route('show', $post->id) }}" > {{ $post->title }}</a></td>
                        <td>{{ $post->teaser }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>{{ $post->author ? $post->author->stagename : 'unknown' }}</td>
                        <td>@if($post->thumbnail)
    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Ảnh sản phẩm" style="max-width: 88.75px; max-height: 60px;">
@endif</td>
                        <td>
                            <a onclick="return confirm('Are you sure?')" href="{{ route('delete', $post->id) }}" class="btn btn-danger">Delete</a>
                            <a href="{{ route('edit', $post->id) }}" class="btn btn-primary">Update</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </form>
                {{ $posts->appends(request()->query()) }}
            </div>
        </div>
    </div>
    <script>
        function selectAll() {
            const checkboxes = document.querySelectorAll('input[name="selectedPosts[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = true);
        }

        function toggleCheckboxes() {
            const checkboxes = document.querySelectorAll('input[name="selectedPosts[]"]');
            const selectAllCheckbox = document.getElementById('selectAllCheckbox');

            checkboxes.forEach(checkbox => checkbox.checked = selectAllCheckbox.checked);
        }
    </script>
@endsection