@extends('layouts.blog')
@section('content')
<script>
  function loadMore(){
    var url = $('.float-right').data('href');
    $.ajax({
      type : 'GET',
      url : url,
      success : function(data){
        if(data.length == 0){

        } else{
          $('#list_post').append(data.html);
          if(data.hasMore){
            var html = '<a class="btn btn-primary float-right" onclick="loadMore();" data-href="' + data.url + '">Older Posts &rarr;</a>';
          }
          else
            var html = '';
          $('#load_more_div').html(html);
        }
      }, error : function(data){
        alert('error');
      }
    });
  }
</script>

<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div id="list_post">
            @include('posts._list')
          </div>
          <!-- Pager -->
          @if($posts -> hasMorePages())
          <div id="load_more_div" class="clearfix">
            <a class="btn btn-primary float-right" onclick="loadMore();" data-href="{{ $posts->nextPageUrl() }}">Older Posts &rarr;</a>
          </div>
          @endif
        </div>
        @if(Auth::check())
          <div class="col-lg-3">
            <div class="information-author">
              <div class="img-author">
                <img src="img/avt-author.jpg" alt="">
              </div>
              <div class="information">
                <p>Họ tên: {{ Auth::user()->name }}</p>
                <p>Tuổi: 23</p>
                <p>Số bài viết: {{ $new_count->count() }}</p>
              </div> 
              <a href="{{ route('posts.create') }}">Tạo bài viết</a>         
            </div>
          </div>
        @endif
      </div>
    </div>
@stop