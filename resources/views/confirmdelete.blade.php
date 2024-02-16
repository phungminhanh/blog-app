

@extends('layouts.master')

@section('content')
    <h1>Confirm Account Deletion</h1>
    <p>Are you sure you want to delete your account, {{ $user->name }}?</p>
    <form action="{{ route('delete.account', $user->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Yes, Delete My Account</button>
    </form>
@endsection
