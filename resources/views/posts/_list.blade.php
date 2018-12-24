@foreach($posts as $post)
  <div class="post-preview">
    <a href="{{ route('posts.show', ['id' => $post -> id]) }}">
      <h2 class="post-title">
        {{ $post -> title }}
      </h2>
      <div class="post_img">
        <img src="{{ $post -> image_url }}" alt="">
      </div>
      <h4 class="post-subtitle">
       {{ str_limit( $post -> content, 100,'...') }}
      </h4>
    </a>
    <p class="post-meta">Posted by
      <a href="#">LamDT</a> on {{ $post -> created_at }}
  </div>
  <hr>
@endforeach