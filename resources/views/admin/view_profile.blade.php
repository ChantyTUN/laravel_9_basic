@extends('admin.admin_master')
@section('admin')

<div class="col-md-6 col-xl-4 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <div class="d-flex flex-row justify-content-between">
            <h4 class="card-title">Profile</h4>
        </div>
        <div class="preview-list">
            <div class="preview-item border-bottom">
            <div class="preview-thumbnail">
                <img src="{{ asset('backend/assets/images/faces/face6.jpg') }}" alt="image" class="rounded-circle">
            </div>
            <div class="preview-item-content d-flex flex-grow">
                <div class="flex-grow">
                <div class="d-flex d-md-block d-xl-flex justify-content-between">
                    <h6 class="text-muted preview-subject"><strong>Name</strong>: {{ @$viewAdminData->name }}</h6> <br>  
                </div>
                <div class="d-flex d-md-block d-xl-flex justify-content-between">
                    <h6 class="text-muted preview-subject"><strong>Username</strong>: {{ @$viewAdminData->username }}</h6> <br>  
                </div>
                <div class="d-flex d-md-block d-xl-flex justify-content-between">
                    <h6 class="text-muted preview-subject"><strong>Email</strong>: {{ @$viewAdminData->email }}</h6> <br>  
                </div>
                    <a href="#" class="btn btn-info btn-icon-text"> 
                        Edit <i class="mdi mdi-file-check btn-icon-append"></i>
                    </a>
                </div>
        
            </div>
            </div>

        </div>
        </div>
    </div>
</div>

@endsection