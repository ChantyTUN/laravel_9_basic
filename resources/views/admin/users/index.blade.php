@extends('admin.admin_master')
@section('admin')
<div class="row ">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Users List</h4>
        <div class="row">
            <div class="col-4">
            <a href="{{ route('admin.user.create') }}" class="btn btn-outline-primary btn-icon-text">
                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Create User </a>
            </div>
            <div class="col-4">
                <form action="{{ route('admin.user') }}" method="get">
                    <input type="text" name="search" id="search" value="{{ @request('search') }}" class="form-control">
                    <button type="submit" id="search" class="btn btn-primary mr-2"> Search</button>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                <th>
                    <div class="form-check form-check-muted m-0">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                    <i class="input-helper"></i></label>
                    </div>
                </th>
                <th></th>
                <th> Name</th>
                <th> Username</th>
                <th> Action </th>
                </tr>
            </thead>
            <tbody>
              
                @foreach($data as $user)
                <tr>
                    <td>
                        <div class="form-check form-check-muted m-0">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                        <i class="input-helper"></i></label>
                        </div>
                    </td>
                    <td>
                        <img src="{{ asset(@$user->profile_image) }}" alt="image">
                    </td>
                    <td> {{ @$user->name }} </td>
                    <td> {{ @$user->username }} </td>
                    <td>Edit</td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        {{ $data->links() }}
       
        </div>
    </div>
    </div>
</div>

@endsection