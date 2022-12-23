@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h5 class="float-start">{{ Str::ucfirst($user->name)."'s" }} Details</h5>
                    <a href="{{ route('users.index') }}" class="btn btn-success btn-sm float-end">View Users</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Information</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Full Name </td>
                                <td>{{ Str::ucfirst($user->name) }}</td>
                            </tr>
                            <tr>
                                <td>Email Address </td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Status </td>
                                <td>{{ $user->status == 1 ? 'Active' : 'Inactive' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection