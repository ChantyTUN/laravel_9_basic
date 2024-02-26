@extends('admin.admin_master')
@section('admin')
<div class="row ">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">List Category</h4>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.contact.message') }}" method="get">
                    <input type="text" name="search" id="search" value="{{ @request('search') }}" class="form-control">
                    <button type="submit" id="search" class="btn btn-primary mr-2"> Search</button>
                </form>
            </div>
        </div>
    
       
        </div>
    </div>
    </div>
</div>

@endsection