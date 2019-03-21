@extends('layout')
@section('content')
	<form action="/add" method="POST" name="add" enctype="multipart/form-data">
    {{ csrf_field() }}  	
	    <div class="row">
	        <div class="col-md-12">
	            <div class="form-group">
	                <strong>Email</strong>
	                <input type="text" name="email" class="form-control" placeholder="Enter Email">
	            </div>
	        </div>
	        <div class="col-md-12">
	            <div class="form-group">
	                <strong>Post</strong>
	                <textarea class="form-control" col="4" name="post" 
	                 placeholder="Enter Post"></textarea>
	            </div>
	        </div>
	        <div class="col-md-12">
	            <div class="form-group">
	                <strong>Anh</strong>	                                 
	                <input type="file" name="image" class="custom-file-input">
	                    {{ csrf_field() }}	                                 
	            </div>
	        </div>	        
	        <div class="col-md-12">
	            <button type="submit" class="btn btn-primary">Submit</button>
	        </div>
	    </div> 
	</form>
@endsection