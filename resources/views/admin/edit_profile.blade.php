@extends('admin.admin_master')
@section('admin')
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Profile Edit</h4>
                    <p class="card-description">Make sure before update </p>
                    <form class="forms-sample">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ @$viewAdminData->name }}" required placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ @$viewAdminData->username }}" required placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail3">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ @$viewAdminData->email }}" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>File upload</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                </span>
                                </div>
                            </div>
                            <div class="form-group">
                            <div class="profile-pic">
                                    <div class="count-indicator">
                                    <img class="img-ms rounded-circle " src="{{ asset('backend/assets/images/faces/face15.jpg') }}" alt="">
                                    <span class="count bg-success"></span>
                                    </div>
                                    <div class="profile-name">
                                    </div>
                                </div>
                            </div>
                        
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>

@endsection