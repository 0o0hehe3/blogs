@extends('layouts.blog')
@section('content')
	<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <form action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" name="title" class="form-control" value="{{ $post->title }}" placeholder="Nhập tiêu đề">
            @if($errors->has('title'))
              <span class="help-block errors-message">{{ $errors->first('title') }}</span>
            @endif             
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Content</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control" placeholder="Nhập nội dung">{{ $post->content }}</textarea>
            @if($errors->has('content'))
              <span class="help-block errors-message">{{ $errors->first('content') }}</span>
            @endif
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Image</label>
              <input type="file" name="image_post" class="form-control">
            @if($errors->has('image_url'))
              <span class="help-block errors-message">{{ $errors->first('image_url') }}</span>
            @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
@stop