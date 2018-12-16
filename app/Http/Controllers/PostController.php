<?php  
	namespace App\Http\Controllers;
	use DB;
	use App\Models\Post;

	class PostController extends Controller
	{
		public function post()
		{
			$posts = Post::paginate(6);
			return view('posts.post',compact('posts'));
		}
	}
?>