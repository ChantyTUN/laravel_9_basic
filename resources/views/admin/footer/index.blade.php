@extends('admin.admin_master')
@section('admin')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Update Footer</h4>
        <p class="card-description"> Please make sure before update </p>
        <form method="post" action="{{ route('admin.store.footer') }}" class="forms-sample">
            @csrf 
            <input type="hidden" name="id" value="{{ @$footer->id }}">
            <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="text" class="form-control" value="{{ @$footer->twitter }}" id="twitter" name="twitter" placeholder="twitter">
            </div>

             <div class="form-group">
                <label for="facebook">Facebook</label>
                <input type="text" class="form-control" value="{{ @$footer->facebook }}" id="facebook" name="facebook" placeholder="facebook">
            </div>

             <div class="form-group">
                <label for="instragram">Instragram</label>
                <input type="text" class="form-control" value="{{ @$footer->instragram }}" id="instragram" name="instragram" placeholder="instragram">
            </div>

             <div class="form-group">
                <label for="inkedin">Linkedin</label>
                <input type="text" class="form-control" value="{{ @$footer->inkedin }}" id="inkedin" name="inkedin" placeholder="linkedin">
            </div>

             <div class="form-group">
                <label for="copyright_by">Copyright</label>
                <input type="text" class="form-control" value="{{ @$footer->copyright_by }}" id="copyright_by" name="copyright_by" placeholder="copyright_by">
            </div>

            <div class="form-group">
                <label for="designed_by">Desgined</label>
                <input type="text" class="form-control" value="{{ @$footer->designed_by }}" id="designed_by" name="designed_by" placeholder="designed_by">
            </div>

        
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
        </form>
        </div>
    </div>
    </div>
    
</div>
@endsection