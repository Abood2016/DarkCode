<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Skill;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $videos = Video::orderBy('id','desc')->paginate(30);
        return view('home',compact('videos'));
    }


    public function category($id)
    {
      $category = Category::findOrFail($id);
      $videos = Video::where('category_id',$id)->orderBy('id' , 'desc')->paginate(30);
      return view('front-end.category.index',compact('videos','category'));

    }


    public function skills($id)
    {
      $skill = Skill::findOrFail($id);

      $videos = Video::whereHas('skills',function($query) use ($id){
        $query->where('skill_id' , $id);
       })->orderBy('id' , 'desc')->paginate(30);

      return view('front-end.skill.index',compact('videos','skill'));

    }

    public function video($id)
    {
      $video = Video::findOrFail($id);

      return view('front-end.video.index',compact('video'));

    }

    public function tags($id)
    {
      $tag = Tag::findOrFail($id);

      $videos = Video::whereHas('tags',function($query) use ($id){
        $query->where('tag_id' , $id);
       })->orderBy('id' , 'desc')->paginate(30);

      return view('front-end.tag.index',compact('videos','tag'));

    }

}
