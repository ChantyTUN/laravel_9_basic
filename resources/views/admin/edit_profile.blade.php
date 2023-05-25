@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Profile Edit</h4>
                    <p class="card-description">Make sure before update </p>
                    <form class="forms-sample" method="post" action="{{ route('admin.update.profile') }}" enctype="multipart/form-data">
                        @csrf
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
                                <div class="input-group col-xs-12">
                                    <input type="file" name="profile_image" id="image_profile" class="form-control file-upload-info" placeholder="Upload Image" accept="image/*" >
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="profile-pic">
                                    <div class="count-indicator">
                                        <img class="img-ms rounded-circle " id="showImageProfile" src="{{ asset('backend/assets/images/faces/face15.jpg') }}" alt="">
                                    <span class="count bg-success"></span>
                                    </div>
                                </div>
                            </div>
                        
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
<!-- Click Change Image  -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#image_profile").change(function(e){
           var readerView = new FileReader();
           readerView.onload = function(e){
            $("#showImageProfile").attr("src",e.target.result);
           }
           readerView.readAsDataURL(e.target.files['0'])
        });
    });
</script>
@endsection