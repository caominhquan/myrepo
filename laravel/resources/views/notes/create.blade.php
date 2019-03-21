@extends('notes.layout')
   
@section('content')
 
<div class="row">
    <div class="col-lg-12 mt40">
        <div class="pull-left">
            <h2>Them hoc sinh</h2>
        </div>
    </div>
</div>
           
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Something went wrong<br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
<form action="{{ route('notes.store') }}" method="POST" name="add_note" enctype="multipart/form-data">
    {{ csrf_field() }}
     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Ten</strong>
                <input type="text" name="title" class="form-control" placeholder="Enter Title">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>So dien thoai</strong>
                <textarea class="form-control" col="4" name="description" 
                 placeholder="Enter Description"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Anh</strong>
                <form enctype="multipart/form-data" action="/image" method="POST">
                    <label>Update image</label>
                    <input type="file" name="image">
                    {{ csrf_field() }}
                    <input type="submit" class="pull-right btn btn-sm btn-primary">
                </form> 
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Khoi</strong>
                <textarea class="form-control" col="4" name="grade" 
                 placeholder="Enter Grade"></textarea>
            </div>
        </div>
        <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    
</form>
@endsection