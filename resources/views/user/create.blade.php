@extends('layout')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-start">
                        {{ !empty($user) ? 'Update User' : ' Add New User' }}
                    </h5>
                    <a href="{{ route('users.index') }}" class="btn btn-success btn-sm float-end">View Users</a>
                </div>
                <div class="card-body">
                    <form action="{{ !empty($user) ? route('users.update', $user->id) : route('users.store') }}" method="POST">
                        @csrf
                        @if (!empty($user))
                            @method('put')
                        @endif
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name"
                                value="{{ !empty($user) ? $user->name : old('full_name') }}"
                                placeholder="Enter your full name">
                            @error('full_name')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email_address" class="form-label">Email address</label>
                            <input type="text" class="form-control" id="email_address" name="email_address"
                            value="{{ !empty($user) ? $user->email : old('email_address') }}" placeholder="Enter your email address">
                            @error('email_address')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter your password">
                            @error('password')
                            <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">{{ !empty($user) ? 'Update User' : 'Save User' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection