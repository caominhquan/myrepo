@extends('notes.layout')
  
@section('content')
  <div class="row mt40">
    <div class="col-md-6">
      <h2>Laravel Crud Example</h2>
    </div>
    <div class="col-md-4">
      <form action="/search" method="get">
        <div class="input-group">
          <input type="search" name="search" class="form-control" style="width: 50%">
          <span class="input-group-prepend">
            <button type="submit" class="btn btn-primary">Search</button>
          </span>
        </div>
      </form>
    </div>
    <div class="col-md-2">
      <a href="{{ route('notes.create') }}" class="btn btn-danger">Add Note</a>
    </div>
    <br><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opps!</strong> Something went wrong<br><br>
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <table class="table table-bordered" id="laravel_crud">
      <thead>
        <tr>
          <th>Id</th>
          <th>Ten</th>
          <th>So dien thoai</th>
          <th>Created at</th>
          <th>Khoi</th>
          <th>Anh</th>
          <td colspan="2">Action</td>
        </tr>
      </thead>
      <tbody>
        @foreach($notes as $note)
        <tr>
          <td>{{ $note->id }}</td>
          <td>{{ $note->title }}</td>
          <td>{{ $note->description }}</td>
          <td>{{ date('d m Y', strtotime($note->created_at)) }}</td>
          <td>{{ $note->grade }}</td>
          <td>
            <img src="'/uploads/images' . {{$note->image}}" style="width: 150px; height: 150px; float: left; margin-right: 25px; margin-top: 25px">  
          </td>
          <td><a href="http://localhost:8888/notes/{{ $note->id}}/edit" class="btn btn-primary">Edit</a></td>
          <td>
            <form action="{{ route('notes.destroy', $note->id)}}" method="post">
              {{ csrf_field() }}
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    {!! $notes->links() !!}
  </div>
@endsection