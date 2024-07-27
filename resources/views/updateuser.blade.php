@extends('layout')

@section('title')
    Update User Data
@endsection
@section('content')
    <form action="{{ route('user.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- <pre>
            @php
                print_r($errors->all());
            @endphp
        </pre> --}}
        <div class="mb-3">
            <label class="form-label">User Name</label>
            <input type="text" class="form-control" name="username" value="{{ $users->name }}">
        </div>
        <div class="mb-3">
            <label class="form-label">User Email</label>
            <input type="email" class="form-control" name="useremail" value="{{ $users->email }}">
        </div>
        <div class="mb-3">
            <label class="form-label">User Age</label>
            <input type="text" class="form-control" name="userage" value="{{ $users->age }}">
        </div>
        <div class="mb-3">
            <label class="form-label">User City</label>
            <input type="text" class="form-control" name="usercity" value="{{ $users->city }}">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
