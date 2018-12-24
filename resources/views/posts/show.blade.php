@extends('layouts.blog')
@section('content')
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div id="list_post">
          	<div class="title">
          		{{$post->title}}
          	</div>
          	<div class="img_show">
          		<img src="{{$post->image_url}}" alt="">
          	</div>
          	<div class="content">
          		{{$post->content}}
          	</div>
          </div>
        </div>
        <div class="col-lg-2 col-md-2">
        	<span>Newest Post</span>
        	<div class="newest_post">
    		@foreach($newest as $new)
        		<div class="img_newest_post">
        			<a href="{{ route('posts.show', ['id' => $new->id]) }}"><img src="{{ $new->image_url }}" alt=""></a>
        		</div>
        		<div class="title_newest_post">
        			<a href="{{ route('posts.show', ['id' => $new->id]) }}"">{{ str_limit($new -> title,50,'...') }}</a>
        		</div>
    		@endforeach
        	</div>
        </div>
      </div>
    </div>
@stop