@extends('notes.layout')
   
@section('content')
 
<div class="row">
    <div class="col-lg-12 mt40">
        <div class="pull-left">
            <h2>Update </h2>
        </div>
    </div>
</div>
    
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opps!</strong> Something went wrong<br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
<form action="" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PATCH')
   
     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Ten</strong>
                <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{$notes->title}}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>So dien thoai</strong>
                <input type="text" class="form-control" name="description" placeholder="Enter Description" value="{{$notes->description}}"> 
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Khoi</strong>
                <input type="text" class="form-control" name="description" placeholder="Enter Description" value="{{$notes->grade}}">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Anh</strong>              
                <label>Update image</label>
                <input type="file" name="image" value="{{$notes->image}}">
                {{ csrf_field() }}
                <input type="submit" class="pull-right btn btn-sm btn-primary">          
            </div>
        </div>
        
        <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    
</form>
@endsection