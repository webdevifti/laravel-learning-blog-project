@extends('adminpanel.layouts.app')
@section('title')
    {{ 'All Category' }}
@endsection
@section('main_content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Categories</h1>
            <a href="/admin/category/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Add A New Category</a>
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
                <h6 class="m-0 font-weight-bold text-primary">All Category</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Category Name</th>
                                <th>Created Time</th>
                                <th>Updated Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Category Name</th>
                                <th>Created Time</th>
                                <th>Updated Time</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ ucwords($category->category) }}</td>
                                <td>{{ date('d-m-Y h:i A', strtotime($category->created_at)) }}</td>
                                <td>{{ date('d-m-Y h:i A', strtotime($category->created_at)) }}</td>
                                <td>
                                    <a href="/admin/category/{{ $category->id }}/edit" class="btn btn-info" title="Edit"><i class="fa fa-pen"></i></a>

                                    <form action="/admin/category/{{ $category->id }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="return confirm('Are Your Sure?')" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></button>
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
               

        