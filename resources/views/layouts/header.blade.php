<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- <meta http-equiv="refresh" content="2" /> --}}
	<title>{{ config('app.name', 'About | Code And Web') }}</title>
	<!-- Site favicon -->
	<link rel="icon" type="image/icon" href="{{ asset('site/img/favicon.png') }}">
	<!-- BOOTSTRAP 3.3.7 -->
	<link rel="stylesheet" type="text/css" href="{{ asset('site/css/bootstrap.min.css') }}">
	<!-- FONT AWESOME 4.7.0 -->
	<link rel="stylesheet" type="text/css" href="{{ asset('site/css/font-awesome.min.css') }}">
	<!-- CUSTOM STYLE 1.0 -->
	<link rel="stylesheet" type="text/css" href="{{ asset('site/style.css') }}">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<nav class="navbar navbar-default navbar-customization">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#NavbarNav">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						
					</button>
					<a href="/" class="navbar-brand">Code and Web</a>
				</div>
				<div class="collapse navbar-collapse" id="NavbarNav">
					<ul class="nav navbar-nav">
						<li><a href="/" class="{{ request()->is('/') ? 'active': ''}}">Blog</a></li>
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">Themes <i class="fa fa-angle-right"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Admin Dashboard</a></li>
								<li><a href="#">Bussines</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Portfolio</a></li>
								<li><a href="#">E-commerce</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" data-toggle="dropdown" class="dropdown-toggle">Templates <i class="fa fa-angle-right"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Admin Dashboard</a></li>
								<li><a href="#">Bussines</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Portfolio</a></li>
								<li><a href="#">E-commerce</a></li>
							</ul>
						</li>
						<li><a href="/resource" class="{{ request()->is('resource') ? 'active': ''}}">Resources</a></li>
						<li><a href="/about" class=" {{ request()->is('about') ? 'active' : ''}}">About</a></li>
						<li><a href="/contact" class="{{ request()->is('contact') ? 'active': ''}}">Contact</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>