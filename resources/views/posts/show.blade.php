@extends('layouts.blog')
@section('js')
<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#like_icon').on('click', function(){
    var id = $(this).data('id');

    $.ajax({
      type: "POST",
      url: "/ajax/like",
      data: {
        post_id : id
      },
      success: function(data){
        if(data.status){
          var like = $('.fa-thumbs-up').html();
          $('.fa-thumbs-up').html(1 + parseInt(like));
        } else{
          alert(data.message);
        }
      }, error: function(data){
        
      }
    });
  });
</script>
@stop
@section('content')
<div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-10 mx-auto">
          <div id="list_post">
          	<div class="title">
          		<h1>{{$post->title}}</h1>
          	</div>
          	<div class="icon-show">
              <i class="fa fa-eye"> {{ $post->view_count}} </i>
              <i class="fa fa-thumbs-up"> {{ $post->like_count}} </i>
              <i class="fa fa-thumbtack" aria-hidden="true"></i>
            </div>
          	<div class="content">
          		{!! $post->content !!}
          	</div>
            <div class="like_div">
              <span id="like_icon" class="fa fa-thumbs-up" data-id="{{ $post->id }}"></span><span id="like_content"></span>
            </div>            
          </div>
        </div>
        <div class="col-lg-3 col-md-2">
        	<span>Newest Post</span>
        	<div style="margin-bottom: 15px" class="newest_post">
    		  @foreach($newest as $new)
        		<div class="img_newest_post">
        			<a href="{{ route('posts.show', ['id' => $new->id]) }}"><img src="{{ $new->image_url }}" alt=""></a>
        		</div>
        		<div class="title_newest_post">
        			<a href="{{ route('posts.show', ['id' => $new->id]) }}"">{{ str_limit($new -> title,50,'...') }}</a>
        		</div>
    	   	@endforeach
        	</div>

          <span>Order View</span>
          <div class="newest_post">
          @foreach($viewest as $view)
            <div class="img_newest_post">
              <a href="{{ route('posts.show', ['id' => $view->id]) }}"><img src="{{ $view->image_url }}" alt=""></a>
            </div>
            <div class="title_newest_post">
              <a href="{{ route('posts.show', ['id' => $view->id]) }}"">{{ str_limit($view -> title,50,'...') }}</a>
            </div>
            <i class="fa fa-eye"> {{ $view->view_count}} </i>
          @endforeach
          </div>
        </div>
      </div>
    </div>
@stop