@extends('admin.admin_master')
@section('admin')
<div class="row ">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">List Category Detail</h4>
        <div class="row">
            <div class="col-4">
            <a href="{{ route('admin.category_detail.create') }}" class="btn btn-outline-primary btn-icon-text">
                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Create Category Detail
            </a>
            </div>
            <div class="col-4">
                <form action="{{ route('admin.testimonail.index') }}" method="get">
                    <input type="text" name="search" id="search" value="{{ @request('search') }}" class="form-control">
                    <button type="submit" id="search" class="btn btn-primary mr-2"> Search</button>
                </form>
            </div>
        </div>

   
    </div>
</div>

@endsection