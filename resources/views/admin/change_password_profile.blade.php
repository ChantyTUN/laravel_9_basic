@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Profile Edit Password</h4>
                    <p class="card-description">Make sure before update </p>

                    @include('message.message')
                    
                    <form class="forms-sample" method="post" action="{{ route('admin.update.password.profile') }}" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="oldpassword">Old Password</label>
                                <input type="password" class="form-control" id="oldpassword" name="oldpassword" value="" required placeholder="Old Password" autofocus>
                            </div>

                            <div class="form-group">
                                <label for="newpassword">New Password</label>
                                <input type="password" class="form-control" id="newpassword" name="newpassword" value="" required placeholder="New Password">
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="" required placeholder="Confirm Password">
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