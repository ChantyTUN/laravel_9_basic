@extends('admin.admin_master')
@section('admin')
<div class="row ">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">List Blog Image</h4>
        <div class="row">
            <div class="col-4">
            <a href="{{ route('admin.blog.image.create') }}" class="btn btn-outline-primary btn-icon-text">
                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Create New Blog Image 
            </a>
            </div>
            <div class="col-4">
                <form action="{{ route('admin.blog.image') }}" method="get">
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
                <th> Title</th>
                <th> Status </th>
                <th> Action </th>
                </tr>
            </thead>
            <tbody>
              
                @foreach($data as $item)
                <tr>
                    <td>
                        <div class="form-check form-check-muted m-0">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                        <i class="input-helper"></i></label>
                        </div>
                    </td>
                    <td>
                        <img src="{{ asset(@$item->image) }}" alt="image">
                    </td>
                    <td> {{ @$item->title }} </td>
                    <td> 
                    @if(@$item->status == 1)
                        <div class="badge badge-outline-success">
                            <a href="{{ route('admin.blog.image.inactive', @$item->id) }}">Active</a>
                        </div>
                    @else 
                        <div class="badge badge-outline-danger">
                            <a href="{{ route('admin.blog.image.active', @$item->id) }}">Inactive</a>
                        </div>
                    @endif
                       
                    </td>
                    <td>
                      
                    <a href="{{ route('admin.blog.edit',@$item->id) }}" class="btn btn-outline-secondary btn-icon-text"> 
                        Edit <i class="mdi mdi-file-check btn-icon-append"></i>
                    </a>

                    <a href="{{ route('admin.blog.detail',@$item->id) }}" class="btn btn-outline-primary btn-icon-text"> 
                        View <i class="mdi mdi-eye-check btn-icon-append"></i>
                    </a>

                    </td>
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