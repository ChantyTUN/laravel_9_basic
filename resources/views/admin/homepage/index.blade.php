@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Update Home Page Information</h4>
        <p class="card-description"> Please make sure before update </p>
        <form method="post" action="{{ route('admin.store.home.page.information') }}" class="forms-sample">
            @csrf 
            <input type="hidden" name="id" value="{{ @$homepage->id }}">
            <div class="form-group">
                <label for="short_title">Short Title</label>
                <input type="text" class="form-control" value="{{ @$homepage->short_title }}" id="short_title" name="short_title" placeholder="Short Title">
            </div>
            <div class="form-group">
                <label for="long_title">Long Title</label>
                <input type="text" class="form-control" value="{{ @$homepage->long_title }}" id="long_title" name="long_title" placeholder="Long Title">
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" class="form-control" value="{{ @$homepage->url }}" id="url" name="url" placeholder="Long Title">
            </div>
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
        </div>
    </div>
    </div>
    
</div>
@endsection