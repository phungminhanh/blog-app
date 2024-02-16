@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập Nhật Thông Tin Người Dùng</div>
                @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

                <div class="card-body">
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Tên Người Dùng</label>
                            <input type="text" name="user_name" class="form-control" id="user_name" value="{{ $user->user_name }}" placeholder="Nhập tên người dùng">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" placeholder="Nhập email">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Vai Trò</label>
                            <select class="form-select" name="role" id="role">
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="editor" {{ $user->role == 'editor' ? 'selected' : '' }}>Editor</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật Khẩu Mới (nếu muốn thay đổi)</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Nhập mật khẩu mới">
                        </div>
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
