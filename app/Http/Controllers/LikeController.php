<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Post;
use App\Models\Like;
use Validator;

class LikeController extends Controller
{
    public function like(Request $request)
    {
    	if(!Auth::user()){
    		return reponse()->json([
    			'status' => false,
    			'message' => 'Ban can dang nhap'
    		]);
    	}

    	$input = $request::all();
    	$rules = [
    		'post_id' => 'required|unique:likes,post_id,user_id'.Auth::user()->id
    	];
		$message = [
			'post_id.required' => 'Khong ton tai post ID',
			'post_id.unique' => "Liked"
		];

    	$validator = Validator::make($input, $rules, $message);

    	if($validator->fails()){
    		return reponse()->json(['status' => fails, 'message' => $validator->errors()]);
    	} else{
    		Like::create(['user_id' => Auth::user()->id, 'post_id' => $request->input('post_id')]);

    		Post::increaseLikes($request->input('post_id'));

    		return reponse()->json([
    			'status' => true
    		]);
    	}
    }
}
