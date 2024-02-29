@extends('admin.admin_master')
@section('admin')

    <h1>Edit Category</h1>
    <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="category">Category:</label>
            <input type="text"  class="form-control"  id="category" name="category" value="{{ $category->category }}">
        </div>
        <div>
            <label for="text">Text:</label>
            <textarea id="text"  class="form-control" name="text">{{ $category->text }}</textarea>
        </div>
        <div>
            <label for="status">Status:</label>
            <select name="status" id="status"  class="form-control" >
                <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary mr-2">Update Category</button>
    </form>

    <br>
    <hr>
    
    <div class="container">
        <h2>>Add Category Detail</h2>
        <form action="{{ route('admin.category_detail.store', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="hidden" name="category_id" id="category_id" value="{{ $category->id }}">
                <label for="images">Images</label>
                <input type="file" name="images[]" class="form-control" id="images" multiple>
            </div>

            <br>
            

            <div class="form-group">
                <label for="images">Old Images</label>
                @foreach (@$categoryDetail as $item)
                        <li>
                            <input type="checkbox" name="old_image_id[]" id="old_image_id" value="{{ @$item->id }}">
                            <img src="{{ asset(@$item->image) }}" alt="" width="60px;" height="60px;" srcset="">
                        </li>
                        <br>
                    @endforeach
            </div>


            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>

@endsection