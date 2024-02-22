@extends('admin.admin_master')
@section('admin')
<div class="row ">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">List Contact Message</h4>
        <div class="row">
            <div class="col-12">
                <form action="{{ route('admin.contact.message') }}" method="get">
                    <input type="text" name="search" id="search" value="{{ @request('search') }}" class="form-control">
                    <button type="submit" id="search" class="btn btn-primary mr-2"> Search</button>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
            
                <th></th>
                <th> Name</th>
                <th> Email</th>
                <th> Subject </th>
                <th> Status </th>
                <th> Action </th>
                </tr>
            </thead>
            <tbody>

            @foreach($data as $item)
                <tr>
                    <td>
                        <div class="form-check form-check-muted m-0">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">
                        <i class="input-helper"></i></label>
                        </div>
                    </td>
                 
                    <td> {{ @$item->name }} </td>
                    <td> {{ @$item->email }} </td>
                    <td> {{ @$item->subject }} </td>
                    <td> 
                    @if(@$item->status == 1)
                        <div class="badge badge-outline-success">
                            <a href="#">Read</a>
                        </div>
                    @else 
                        <div class="badge badge-outline-danger">
                            <a href="#">Unread</a>
                        </div>
                    @endif
                       
                    </td>
                    <td>
                      
                    <a href="{{ route('admin.message_view', @$item->id) }}" class="btn btn-outline-secondary btn-icon-text"> 
                        View <i class="mdi mdi-file-check btn-icon-append"></i>
                    </a>

                    </td>
                </tr>
                @endforeach
             
            </tbody>
            </table>
        </div>
      
       
        </div>
    </div>
    </div>
</div>

@endsection