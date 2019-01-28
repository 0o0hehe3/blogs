<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use DB;
class Like extends Model
{
	// 
	protected $table = 'likes';
	protected $fillable = [
		'user_id',
		'post_id',
	];
} 