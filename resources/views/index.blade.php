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
			@foreach ($posts as $post)
			<article>
				<div class="row">
					<div class="col-sm-3">
						<img class="article-thumbnail" src="{{ asset('images/'.$post->post_thumbnail) }}">
					</div>
					<div class="col-sm-9">
						<h3 class="article-title"><a href="#">{{ $post->title }}</a></h3>
						<span class="article-publish-date">{{ $post->created_at }}</span><br>
						
						<div class="article-category">
							<a href="#">{{ $post->category }}</a>
						</div>
						<p class="">{{ substr($post->post_body, 0,200) }}</p>
						<a href="/post/{{ $post->title }}" class="readmore">Read More <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</article>
			@endforeach
				
			</main>
			<aside class="col-sm-4" id="sidebar">
				<div class="widgets">
					<h3 class="widget-title">Recent Posts</h3>
					<ul>
					  @foreach ($sidebar as $item)
					  <li>
						<a href="#">
							<img src="{{ asset('images/'.$item->post_thumbnail) }}" alt="Post Thumbnail">
							<h4>{{ $item->title }}</h4>
						</a>
					</li>
					  @endforeach
						
			
						
					   
					</ul>
				</div>
			</aside>
		</div>
	</div>
	
@endsection