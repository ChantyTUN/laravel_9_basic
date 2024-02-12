@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="row ">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Create Service</h4>
        <form class="forms-sample" method="post" action="{{ route('admin.service.store') }}" 
                    enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="title" name="title" required placeholder="Title">
            </div>

            <div class="form-group">
                <label for="name">Icon</label>
                <input type="text" class="form-control" id="icon" name="icon" required placeholder="icon">
            </div>

            <div class="form-group">
                <label for="name">Detail</label>
                <textarea  class="form-control" name="des" id="des" cols="30" rows="10"></textarea>
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