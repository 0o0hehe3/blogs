<?php  
	namespace App\Http\Controllers;
	use DB;
	use App\Models\Post;
	use Illuminate\Http\Request;
	use Validator;
	use File;
	use Illuminate\Support\Facades\Auth;

	class PostController extends Controller
	{
		public function post(Request $request)
		{
			//Lay toan bo csdl trong bang posts: $posts = Post::get();
			if(Auth::check()){
				$new_count = DB::table('posts')->where('user_id', Auth::user()->id)->get();
			}
			
			$posts = Post::orderBy('created_at','desc')->paginate(6);

			if($request -> ajax()) {
				$view = view('posts._list',compact('posts')) -> render();

				return response() -> json([
					'html' => $view, 
					'hasMore' => $posts->hasMorePages(), 
					'url' => $posts->nextPageUrl()
				]);
			}
			
			return view('posts.post',compact('posts','new_count'));
		}

		public function show(Request $request,$id)
		{
			Post::increaseViews($id);
			$post = Post::find($id);
			$newest = DB::table('posts')->whereNotIn('id',[$id])->take(3)->orderBy('id','desc')->get();
			$viewest = Post::orderBy('view_count','desc')->get();
			return view('posts.show', compact('post','newest','viewest'));
		}

		public function create()
		{
			if(Auth::check())
				return view('posts.create');
			else
				return view('login.formLogin');
		}

		public function store(Request $request)
		{
			$validator = Validator::make($request->all(), $rules = [
		      'title' => 'required|unique:posts|max:255',
		      'content' => 'required',
		      'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		    ], $messages = [
		      'title.required' => trans('post.title_required'),
		      'title.unique' => trans('post.title_unique'),
		      'content.required' => trans('post.content_required'),
		      'image_url.required' => trans('post.image_require'),
		      'image_url.image' => trans('post.image_image'),
		      'image_url.mimes' => trans('post.image_mimes'),
		      'image_url.max' => trans('post.image_max'),
		    ]);

		    if ($validator->fails()) {
		        $request->flash();
		        return view('posts.create')->withErrors($validator);
		        // return redirect(route('posts.create'))->withInput();
		    }

    		$image = $request->file('image_url');
			$image_name = time().'-'.$image->getClientOriginalName();
			$store_path = '/upload/images/posts/';
			$destinationPath = public_path($store_path);
			$image->move($destinationPath, $image_name);

			Post::create([
				'title' => $request->input('title'),
				'content' => $request->input('content'),
				'user_id' => Auth::user()->id,
				'image_url' => $store_path.$image_name,
			]);

			return redirect('post');
		}

		public function edit($id)
		{
			if(Auth::check())
			{
				$post = Post::find($id);
				return view('posts.edit', compact('post'));
			}
			else
			{
				return view('login.formLogin');
			}				
		}

		public function update(Request $request, $id)
		{
			$post = Post::find($id);
			
			$validator = Validator::make($request->all(), $rules = [
		      'title' => 'required|unique:posts,title,'.$id.'|max:255',
		      'content' => 'required',
		      'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		    ], $messages = [
		      'title.required' => trans('post.title_required'),
		      'title.unique' => trans('post.title_unique'),
		      'content.required' => trans('post.content_required'),
		      'image_url.required' => trans('post.image_require'),
		      'image_url.image' => trans('post.image_image'),
		      'image_url.mimes' => trans('post.image_mimes'),
		      'image_url.max' => trans('post.image_max'),
		    ]);

		    if ($validator->fails()) {
		        $request->flash();
		        return view('posts.edit', compact('post'))->withErrors($validator);
		    }
		    else{
		    	$post->update([
					'title' => $request->input('title'),
					'content' => $request->input('content'),
					'user_id' => 1,
				]);

		    	if($request->has('image_url')){
		    		$image = $request->file('image_url');
					$image_name = time().'-'.$image->getClientOriginalName();
					$store_path = '/upload/images/posts/';
					$destinationPath = public_path($store_path);
					$image->move($destinationPath, $image_name);
					File::delete(public_path($post->image_url));
		    	}

		    	$post->update([
		    		'image_url' => $store_path.$image_name,
				]);		    	
		    }				

			return redirect('post');
		}

		public function delete($id)
		{
			$post = Post::find($id);
			$post -> delete();
			return redirect('post');
		}
	}
?>