@extends('layouts.app')

@section('content')
<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit Category</h3>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('categories.update', $category)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" value="{{$category->title}}" class="form-control" name="title" id="exampleInputEmail1" placeholder="...">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <input type="text" value="{{$category->description}}" class="form-control" name="description" id="exampleInputPassword1" placeholder="...">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">File Image</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="form-control-file" name="image" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <img src="{{ Storage::url($category->image) }}" width="100" alt="">
          </div>
        </div>
        <div class="form-check">
          <input type="checkbox" value="1" {{$category->status==1?'checked':''}} name="status" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Status</label>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
  </div>
@endsection
