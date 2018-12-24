@extends('layouts.blog')
@section('content')
<script>
  function loadMore(){
    var url = $('list_post float-right').data('href');
    console.log(url);
    
    $.ajax({
      type : 'GET',
      url : url,
      success : function(data){
        if(data.length == 0){

        } else{
          $('#list_post').append(data.html);
          if(data.hasMore)
            var html = '<a class="btn btn-primary float-right" onclick="loadMore();" data-href="'+ data.url + '">Older Posts &rarr;</a>';
          else
            html = '';
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
          <div class="clearfix">
            <a class="btn btn-primary float-right" onclick="loadMore();" data-href="{{ $posts->nextPageUrl() }}">Older Posts &rarr;</a>
            <a class="btn btn-primary float-left" data-href="{{ $posts->previousPageUrl() }}">&larr; Older Posts </a>
          </div>
          @endif
        </div>
      </div>
    </div>
@stop