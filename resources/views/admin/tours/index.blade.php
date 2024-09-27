@extends('layouts.app')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">List Category</h3>
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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listCate as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>
                            <img src="{{ Storage::url($item->image) }}" width="100" alt="">
                        </td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>
                            @if ($item->status == 1)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Un Active</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('categories.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Bạn có muốn xoá không?')" action="{{ route('categories.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm" value="Xoá">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
