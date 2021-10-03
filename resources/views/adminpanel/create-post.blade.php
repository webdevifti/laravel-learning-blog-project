@extends('adminpanel.layouts.app')
@section('title')
    {{ 'Create A New Posts' }}
@endsection
@section('main_content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add A New Post</h1>
        <a href="/admin/posts" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Back</a>
    </div>
     {{-- IF any Error it will show the errors --}}
     @if ($errors->any())
     @foreach ($errors->all() as $error)
     <div class="alert alert-danger alert-dismissible">
         <button type="button" class="close" data-dismiss="alert">&times;</button>
         <strong>Error!</strong> {{ $error }}
       </div>
     @endforeach
 @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3>Post Form</h3>
        </div>
        <div class="card-body">
            <form action="/admin/posts" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" placeholder="Enter Post Title" class="form-control" required>
                </div>
                <div class="form-group">
                    <textarea name="post_body" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <select name="category" id="" class="form-control">
                        <option value="0">Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ ucwords($item->category) }}</option>
                        @endforeach
                        
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="fileInput"  class="btn btn-info">Upload Thumbnail</label>
                    <input type="file" id="fileInput"  style="display: none" name="post_thumbnail">
                </div>
          
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Post</button>
        </div>
        </form>
    </div>
</div>

    
@endsection