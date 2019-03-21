@extends('layout')

@section('content')
	
	<form action="/updateimage/ {{ $employees->id }}" method="POST" enctype="multipart/form-data">
	    {{ csrf_field() }}
	    {{ method_field('PUT') }}  
	    <div class="row">
	    	<input type="hidden" name="id" value="{{ $employees->id }}">
	        <div class="col-md-12">
	            <div class="form-group">
	                <label>Email</label>
	                <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{$employees->email}}">
	            </div>
	        </div>
	        <div class="col-md-12">
	            <div class="form-group">
	                <label>Post</label>
	                <input type="text" class="form-control" name="post" placeholder="Enter Post" value="{{$employees->post}}"> 
	            </div>
	        </div>	        
	        <div class="col-md-12">
	            <div class="input-group">	                             
	                <label class="custom-file-label">Update image</label>
	                <input type="file" name="image" class="custom-file-input" value="{{$employees->image}}">                    
	            </div>
	        </div>
	        
	        <div class="col-md-12">
	                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
	        </div>
	    </div>
	    
	</form>
@endsection