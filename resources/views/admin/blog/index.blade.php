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
                        <div class="badge badge-outline-success">Active</div>
                    </td>
                    <td>
                      
                    </td>
                </tr>
                @endforeach
               
            </tbody>
            {{ $data->links() }}
            </table>
        </div>
        </div>
    </div>
    </div>
</div>

@endsection