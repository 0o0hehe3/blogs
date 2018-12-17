@extends('layouts.blog')
@section('content')

<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          @foreach($posts as $post)
          <div class="post-preview">
            <a href="post.html">
              <h2 class="post-title">
                {{ $post -> title }}
              </h2>
              <h3 class="post-subtitle">
               {{ $post -> content }}
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#">LamDT</a>
          </div>
          <hr>
          @endforeach

          {{ $posts -> links() }} <!-- Phan trang -->
          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
          </div>
        </div>
      </div>
    </div>
@stop