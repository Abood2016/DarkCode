<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Tag;
use App\Models\Comment;

class HomeController extends Controller
{
    public function index()
	{
		$comments = Comment::with('user','video')->orderBy('id','desc')->paginate(10);
		return view('back-end.home',compact('comments'));
	}
}
