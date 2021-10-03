@extends('adminpanel.layouts.app')
@section('title')
    {{ 'My Profile' }}
@endsection
@section('main_content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Profile</h1>
            <a href="/admin/profile" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-left-arrow fa-sm text-white-50"></i> Back</a>
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
        
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Update Profile</h6>
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                       <form action="/admin/profile/{{ $user_info->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="fileInput"  class="btn btn-info">Upload Photo</label>
                            <input type="file" id="fileInput"  style="display: none" name="photo">
                            <img src="{{ asset('profile/'.$user_info->photo ) }}" alt="Profile Photo" style="width:150px;height:100px;object-fit:contain">
                        </div>
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name" value="{{ $user_info->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email" value="{{ $user_info->email }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                       
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                       <form action="/admin/profile/password/{{ $user_info->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <input type="text" name="current_password" placeholder="Current Password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="newpassword" placeholder="New Password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Change Password</button>
                        </div>
                        </form>
                       
                    </div>
                </div>
            </div>
           
           
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
               

        