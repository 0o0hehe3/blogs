@extends('layouts.blog')
@section('content')
	<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <form action="{{ route('posts.update', ['id' => $post->id]) }}" enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Title</label>
              <input type="text" name="title" class="form-control" value="{{ old('title') ? old('title') : $post->title }}" placeholder="Nhập tiêu đề">
            @if($errors->has('title'))
              <span class="help-block errors-message">{{ $errors->first('title') }}</span>
            @endif             
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Content</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control ckeditor" placeholder="Nhập nội dung">{{ old('content') ? old('content') : $post->content }}</textarea>
            @if($errors->has('content'))
              <span class="help-block errors-message">{{ $errors->first('content') }}</span>
            @endif
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Image</label>
              <input type="file" name="image_url" class="form-control">
            </div>
            <div class="form-group">
            	<img id="edit_image" src="{{ $post->image_url }}" alt="">
           	@if($errors->has('image_url'))
              <span class="help-block errors-message">{{ $errors->first('image_url') }}</span>
            @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace('ckeditor');
    </script>
@stop