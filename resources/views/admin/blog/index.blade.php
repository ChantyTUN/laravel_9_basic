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
                <th> Client Name </th>
                <th> Order No </th>
                <th> Product Cost </th>
                <th> Project </th>
                <th> Payment Mode </th>
                <th> Start Date </th>
                <th> Payment Status </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="form-check form-check-muted m-0">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                        <i class="input-helper"></i></label>
                        </div>
                    </td>
                    <td>
                        <img src="{{ asset('backend/assets/images/faces/face1.jpg') }}" alt="image">
                        <span class="pl-2">Henry Klein</span>
                    </td>
                    <td> 02312 </td>
                    <td> $14,500 </td>
                    <td> Dashboard </td>
                    <td> Credit card </td>
                    <td> 04 Dec 2019 </td>
                    <td>
                        <div class="badge badge-outline-success">Approved</div>
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection