@extends('adminpanel.layouts.app')
@section('title')
    {{ 'Update Posts' }}
@endsection
@section('main_content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Update Post</h1>
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
            <form action="/admin/posts/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" name="title" placeholder="Enter Post Title" value="{{ $data->title }}" class="form-control" required>
                </div>
                <div class="form-group">
                    <textarea name="post_body" placeholder="Write Post Content" class="form-control" id="" cols="30" rows="10">{{ $data->post_body }}</textarea>
                </div>
                <div class="form-group">
                    <select name="category" id="" class="form-control">
                        <option value="0">Select Category</option>
                        @foreach ($cat as $item)
                            @if ($item->id == $data->category_id)
                                <option selected value="{{ $item->id }}">{{ ucwords($item->category) }}</option>
                            @else
                                <option value="{{ $item->id }}">{{ ucwords($item->category) }}</option>
                            @endif
                        @endforeach
                        
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="fileInput"  class="btn btn-info">Upload Thumbnail</label>
                    <input type="file" id="fileInput"  style="display: none" name="post_thumbnail">
                    <img src="{{ asset('images/'.$data->post_thumbnail ) }}" alt="" style="width:150px;height:100px;object-fit:contain">
                </div>
          
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Post</button>
        </div>
        </form>
    </div>
</div>

    
@endsection