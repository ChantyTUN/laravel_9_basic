@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Blog Detail Edit</h4>
                    <p class="card-description">Make sure before update </p>
                    <form class="forms-sample" method="post" action="{{ route('admin.update.blog.detail') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" class="form-control" id="bloge_image_id" name="bloge_image_id" value="{{ @$data->bloge_image_id }}">

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ @$data->title }}" required placeholder="Name">
                            </div>

                            <div class="form-group">
                                <label for="title">Detail</label>
                                <textarea class="form-control" name="dec" id="dec" cols="30" rows="10">
                                    {!! @$data->dec !!}
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
                        
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-dark">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
<!-- Click Change Image  -->
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('dec');
</script>

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