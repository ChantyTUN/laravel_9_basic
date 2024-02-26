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

@endsection