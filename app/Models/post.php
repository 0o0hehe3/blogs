<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Post extends Model
{
	protected $fillable = [
		'title',
		'content',
		'image_url',
		'user_id',
		'view_count',
		'like_count',
	];
	
	static public function increaseViews($id)
	{
		return Post::where('id', $id)->update(['view_count' => DB::raw('view_count + 1')]);
	}

	static public function increaseLikes($id)
	{
		return Post::where('id', $id)->update(['like_count' => DB::raw('like_count + 1')]);
	}
}