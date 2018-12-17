<?php  
	namespace App\Http\Controllers;
	use DB;
	use App\Models\Post;

	class PostController extends Controller
	{
		public function post()
		{
			//Lay toan bo csdl trong bang posts
			// $posts = Post::get();
			$posts = Post::paginate(6);
			return view('posts.post',compact('posts'));
		}
	}
?>