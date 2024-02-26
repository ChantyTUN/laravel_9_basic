@extends('admin.admin_master')
@section('admin')
<div class="row ">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">List Category</h4>
        <div class="row">
            <div class="col-4">
            <a href="{{ route('admin.category.create') }}" class="btn btn-outline-primary btn-icon-text">
                    <i class="mdi mdi-file-check btn-icon-prepend"></i> Create New Category
            </a>
            </div>
            <div class="col-4">
                <form action="{{ route('admin.testimonail.index') }}" method="get">
                    <input type="text" name="search" id="search" value="{{ @request('search') }}" class="form-control">
                    <button type="submit" id="search" class="btn btn-primary mr-2"> Search</button>
                </form>
            </div>
        </div>

    <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                <th>
                    <div class="form-check form-check-muted m-0">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input">
                    <i class="input-helper"></i></label>
                    </div>
                </th>
                <th> Category</th>
                <th> Text</th>
                <th> Status </th>
                <th> Images </th>
                <th> Action </th>
                </tr>
            </thead>
            <tbody>
              
                @foreach($categories as $category)
                <tr>
                    <td>
                        <div class="form-check form-check-muted m-0">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                        <i class="input-helper"></i></label>
                        </div>
                    </td>
                 
                    <td> {{ $category->category }}</td>
                    <td> {{ $category->text }}</td>

                    <td> 
                    @if(@$category->status == 1)
                        <div class="badge badge-outline-success">
                            <a href="">Active</a>
                        </div>
                    @else 
                        <div class="badge badge-outline-danger">
                            <a href="">Inactive</a>
                        </div>
                    @endif
                       
                    </td>

                    <td>

                    @foreach (@$category->details as $detail)
                        <li>{{ @$detail->image }}</li>
                    @endforeach
                    </td>

                    <td>
                      
                    <a href="#" class="btn btn-outline-secondary btn-icon-text"> 
                        Edit <i class="mdi mdi-file-check btn-icon-append"></i>
                    </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        {{ $categories->links() }}



        </div>
    </div>
    </div>
</div>

@endsection