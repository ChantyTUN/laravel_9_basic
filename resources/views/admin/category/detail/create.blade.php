@extends('admin.admin_master')
@section('admin')
<div class="row ">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Create Category Detail</h4>
    
        <div class="row">
            <form method="POST" action="{{ route('admin.category_detail.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control">
                        <option value="" selected disabled>--- select category ----</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Other form fields -->
                <div class="form-group">
                    <label for="image">Images</label>
                    <input type="file" name="image[]" class="form-control" multiple class="form-control-file">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
   
    </div>
</div>

@endsection