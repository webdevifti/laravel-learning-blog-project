@extends('adminpanel.layouts.app')
@section('title')
    {{ 'All Posts' }}
@endsection
@section('main_content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Posts</h1>
            <a href="/admin/posts/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Add A New Post</a>
        </div>
        <div class="message">
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> {{ session('message') }}
              </div>
            @endif
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Post</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Thumbnail</th>
                                <th>Category</th>
                                <th>Content</th>
                                <th>Created Time</th>
                                <th>Updated Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Thumbnail</th>
                                <th>Category</th>
                                <th>Content</th>
                                <th>Created Time</th>
                                <th>Updated Time</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($data as $post)
                            <tr>
                                <td>{{ ucwords($post->title) }}</td>
                                <td><img src="{{ asset('images/'.$post->post_thumbnail )}}" alt=""  style="width:150px;height:100px;object-fit:contain"/></td>
                                <td>{{ $post->category }}</td>
                                <td>{{ substr($post->post_body, 0, 200) }}</td>
                                <td>{{ date('d-m-Y h:i A', strtotime($post->created_at)) }}</td>
                                <td>{{ date('d-m-Y h:i A', strtotime($post->created_at)) }}</td>
                                <td>
                                    <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-pen"></i></a>

                                    <form action="/admin/posts/{{ $post->id }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are Your Sure?')" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></button>
                                    </form>
                                    
                                </td>
                                
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
               

        