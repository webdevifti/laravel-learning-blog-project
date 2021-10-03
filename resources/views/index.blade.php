@extends('layouts.app')
@section('main_content')
	

	<div class="banner">
		<div class="container">
			<h3 class="sitename">Code and Web <i class="fa fa-angle-right"></i> Blog</h3>
			<p class="site-description">News and update related to web programming and articles showcasing content <br> related to web application programmer.</p>
			
		</div>
	</div>
	<div class="container">
		<div class="row">
			<main class="col-sm-8" id="content">
				<article>
					<div class="row">
						<div class="col-sm-3">
							<img class="article-thumbnail" src="{{ asset('site/img/favicon.png') }}">
						</div>
						<div class="col-sm-9">
							<h3 class="article-title"><a href="#">Free Bootstrap theme 2020 updates</a></h3>
							<span class="article-publish-date">Nov 15, 2020</span><br>
							<div class="article-category">
								<a href="#">News</a>
								<a href="#">Angular</a>
							</div>
							<p class="article-des">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							<a href="#" class="readmore">Read More <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</article>
				<article>
					<div class="row">
						<div class="col-sm-3">
							<img class="article-thumbnail" src="{{ asset('site/img/download.jpg') }}">
						</div>
						<div class="col-sm-9">
							<h3 class="article-title"><a href="#">Free Bootstrap theme 2020 updates</a></h3>
							<span class="article-publish-date">Nov 15, 2020</span><br>
							
							<div class="article-category">
								<a href="#">News</a>
								<a href="#">Angular</a>
							</div>
							<p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							<a href="#" class="readmore">Read More <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</article>
			</main>
			<aside class="col-sm-4" id="sidebar">
				<div class="widgets">
					
				</div>
			</aside>
		</div>
	</div>
	
@endsection