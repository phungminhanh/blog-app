@extends('layouts.master')
@section('content')
    <div class="col-12 col-md-12 mt-2">
        <div class="card">
            <h5 class="card-header">Posts</h5>
            <div class="card-body">
                <div class="col-6">
                    
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">status</th>
                        <th scope="col">admin</th>
                        <th scope="col">post</th>
                        <th scope="col">created_at</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($histories as $index => $history)
                        <tr>
                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $history->status }}</td>
                            <td>{{ $history->id_admin }}</td>
                            <td>{{ $history->id_post }}</td>
                            <td>{{ $history->created_at }}</td>
                           
                            
                    
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $histories->appends(request()->query()) }}
            </div>
        </div>
    </div>

@endsection