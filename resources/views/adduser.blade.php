@extends('layout')

@section('title')
    Add New User
@endsection
@section('content')
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">User Name</label>
            <input type="text" class="form-control" name="username">
        </div>
        <div class="mb-3">
            <label class="form-label">User Email</label>
            <input type="email" class="form-control" name="useremail">
        </div>
        <div class="mb-3">
            <label class="form-label">User Age</label>
            <input type="text" class="form-control" name="userage">
        </div>
        <div class="mb-3">
            <label class="form-label">User City</label>
            <input type="text" class="form-control" name="usercity">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
