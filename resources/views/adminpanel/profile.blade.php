@extends('adminpanel.layouts.app')
@section('title')
    {{ 'My Profile' }}
@endsection
@section('main_content')
     <!-- Begin Page Content -->
     <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
            <a href="/admin/profile/edit/{{ Auth::user()->id }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-pen fa-sm text-white-50"></i> Edit Profile</a>
        </div>
        <div class="message">
            @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> {{ session('message') }}
              </div>
            @endif
        </div>
        <div class="row">

            <div class="col-xl-4 col-lg-3"></div>
           
            <div class="col-xl-4 col-lg-6">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div
                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
                        
                    </div>
                    <!-- Card Body -->
                    <div class="card-body text-center">
                        <img src="{{ asset('profile/'.Auth::user()->photo) }}" alt="Profile Photo">
                       
                        <h3 class="bg-dark text-white p-3"><strong>Name: </strong> {{ Auth::user()->name }}</h3>
                        
                        <h3 class="bg-dark text-white p-3"><strong>Email: </strong> {{ Auth::user()->email }}</h3>
                       
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
               

        