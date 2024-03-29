@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Testimonail Edit</h4>
                    <p class="card-description">Make sure before update </p>
                    <form class="forms-sample" method="post" action="{{ route('admin.update.testimonail') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" class="form-control" id="id" name="id" value="{{ @$data->id }}">

                            <div class="form-group">
                                <label for="title">Rate</label>
                                <input type="text" class="form-control" id="rate" name="rate" value="{{ @$data->rate }}" required placeholder="Rate">
                            </div>

                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ @$data->name }}" required placeholder="name">
                            </div>
                
                            <div class="form-group">
                                <label for="name">Position</label>
                                <input type="text" class="form-control" id="position" name="position" value="{{ @$data->position }}" required placeholder="position">
                            </div>

                            <div class="form-group">
                                <label for="name">Detail</label>
                                <textarea class="form-control" id="dec" name="dec" cols="30" rows="10">
                                    {{ @$data->dec }}
                                </textarea>
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
                                             {{ (!empty(@$data->image)) ? asset(@$data->image) : asset('backend/upload/no_image.png') }}
                                        " width="80px;" height="80px;" alt="">
                                    <span class="count bg-success"></span>
                                    </div>
                                </div>
                            </div>
                        
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                    </form>
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