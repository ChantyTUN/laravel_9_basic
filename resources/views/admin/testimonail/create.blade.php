@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="row ">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Create Testimonail</h4>
        <form class="forms-sample" method="post" action="{{ route('admin.testimonail.store') }}" 
                    enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required placeholder="name">
            </div>

            <div class="form-group">
                <label for="position">Position</label>
                <input type="text" class="form-control" id="position" name="position" required placeholder="position">
            </div>

            <div class="form-group">
                <label for="rate">Rate</label>
                <input type="number" class="form-control" id="rate" name="rate" required placeholder="rate">
            </div>

            <div class="form-group">
                <label for="rate">Detail</label>
                <textarea name="dec" id="dec" cols="30" rows="10" class="form-control"></textarea>
            </div>


             <div class="form-group">
                <label>File upload</label>
                <div class="input-group col-xs-12">
                    <input type="file" name="image" id="image_blog" class="form-control file-upload-info" placeholder="Upload Image" accept="image/*" >
                </div>
            </div>
            <div class="form-group">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-ms rounded-circle " id="showImageBlog" src="
                            {{ asset('backend/upload/no_image.png') }}
                        " width="80px;" height="80px;" alt="">
                    <span class="count bg-success"></span>
                    </div>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>        
      
        </div>
    </div>
    </div>
</div>

<!-- Click Change Image  -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#image_blog").change(function(e){
           var readerView = new FileReader();
           readerView.onload = function(e){
            $("#showImageBlog").attr("src",e.target.result);
           }
           readerView.readAsDataURL(e.target.files['0'])
        });
    });
</script>

@endsection