@extends('adminpanel.layouts.app')
@section('title')
    {{ 'Update Category' }}
@endsection
@section('main_content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Categorys</h1>
        <a href="/admin/category" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>

    <div>
        {{-- IF any Error it will show the errors --}}
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Error!</strong> {{ $error }}
              </div>
            @endforeach
        @endif
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Category Form</h3>
        </div>
        <div class="card-body">
            <form action="/admin/category/{{ $data->id }}" method="POST">
                @csrf;
                @method('PUT')
                <div class="form-group">
                    <input type="text" name="category" value="{{ $data->category }}" class="form-control" autocomplete="off">
                </div>
          
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
        </form>
    </div>
</div>

    
@endsection