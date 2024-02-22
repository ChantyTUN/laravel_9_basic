@extends('admin.admin_master')
@section('admin')
<div class="row ">
    <div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
        <h4 class="card-title">Contact Message Detail</h4>
        <hr>
        <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="">
            <div class="card-body">
                <h4 class="card-title"><label for="">Name: </label> {{ @$data->name }}</h4>
                <p class="card-text">
                    <label for="">Email: </label> {{ @$data->email }}
                </p>
                <p class="card-text">
                    <label for="">Subject: </label> {{ @$data->subject }}
                </p>
                <p class="card-text">
                    <label for="">Message: </label> {{ @$data->message }}
                </p>

                <p class="card-text">
                    <label for="">Submit Time: </label> {{ @$data->created_at->format('Y-m-d  H:i') }}
                </p>
              
            </div>
        </div>
     
       
        </div>
    </div>
    </div>
</div>

@endsection