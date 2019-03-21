@extends('notes.layout')

@section('content')
	<div class="col-md-12">
     	My image 
     	<img src="/uploads/images/default.jpg" style="width: 150px; height: 150px; float: left; margin-right: 25px; margin-top: 25px">  
     	<form enctype="multipart/form-data" action="/image" method="POST">
	     	<label>Update image</label>
	     	<input type="file" name="image">
	     	{{ csrf_field() }}
	     	<input type="submit" class="pull-right btn btn-sm btn-primary">
     	</form>    
    </div>
@endsection