@extends('layout')
@section('content')


<div class="container">
    <div class="card mb-4">
        <div class="card-header">
          <h5 class="float-start">All Users </h5>
          <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-end">Add New User</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Sl No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $key => $user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="form-check form-switch ml-4">
                                @if ($user->status == 1)
                               <input class="form-check-input" type="checkbox" role="switch"
                                    id="flexSwitchCheckDefault" checked>
                                @else
                                <input class="form-check-input" type="checkbox" role="switch"
                                    id="flexSwitchCheckDefault">
                                @endif
                            </div>
                        </td>
                        <td>
                            @if ($user->status == 1)
                            <a href="{{ url('user/'.$user->id.'/inactive') }}" class="btn btn-sm btn-primary" title="Inactive Now"><i class="fa-solid fa-thumbs-down"></i></a>
                            @else
                            <a href="{{ url('user/'.$user->id.'/active') }}" class="btn btn-sm btn-primary" title="Active Now"><i class="fa-solid fa-thumbs-up"></i></a>
                            @endif
                            
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-sm btn-info" title="View Details"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-success" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ url('users/'.$user->id.'/delete') }}" id="delete" class="btn btn-sm btn-danger" title="Delete"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>               
            </table>
        </div>
    </div>
</div>

@endsection
