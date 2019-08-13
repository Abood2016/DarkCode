<?php

namespace App\Http\Controllers;
use App\Http\Requests\FrontEnd\Comments\Store;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Skill;
use App\Models\Message;
use App\Models\Comment;
use App\Models\Page;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([

         'commentUpdate','commentStore','profileUpdate'

      ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $videos = Video::Published()->orderBy('id','desc');
        if (request()->has('search') && request()->get('search')  != '') {
          $videos = $videos->where('name' , 'like' , "%".request()->get('search')."%");
        }
        $videos = $videos->paginate(30);
        return view('home',compact('videos'));
    }


    public function category($id)
    {
      $category = Category::findOrFail($id);
      $videos = Video::Published()->where('category_id',$id)->orderBy('id' , 'desc')->paginate(30);
      return view('front-end.category.index',compact('videos','category'));

    }


    public function skills($id)
    {
      $skill = Skill::findOrFail($id);

      $videos = Video::Published()->whereHas('skills',function($query) use ($id){
        $query->where('skill_id' , $id);
       })->orderBy('id' , 'desc')->paginate(30);

      return view('front-end.skill.index',compact('videos','skill'));

    }

    public function video($id)
    { 
      //with its for reduce query number in load
      $video = Video::Published()->with('tags','category','skills','comments.user','user')->findOrFail($id);

      return view('front-end.video.index',compact('video'));

    }

    public function tags($id)
    {
      $tag = Tag::findOrFail($id);

      $videos = Video::Published()->whereHas('tags',function($query) use ($id){
        $query->where('tag_id' , $id);
       })->orderBy('id' , 'desc')->paginate(30);

      return view('front-end.tag.index',compact('videos','tag'));

    }


    public function commentUpdate($id , Store $request)
    { 
      $comment = Comment::findOrFail($id);
      if ($comment->user_id == auth()->user()->id ||auth()->user()->group == 'admin' ) {
          
       $comment->update(['comment' => $request->comment]);

      }
      alert()->success('Comment Updated Successfully','Done');
      return redirect()->route('frontend.video' , ['id' => $comment->video_id , '#comments']);
    }


    public function commentStore (Store $request , $id)
    {
      $video = Video::Published()->findOrFail($id);

       Comment::create([
        'user_id' =>auth()->user()->id,
        'video_id' => $video->id,
        'comment' =>$request->comment
      ]);
       alert()->success('Comment Add','Done');
      return redirect()->route('frontend.video' , ['id' => $video->id , '#comments']);

    }

    public function storeMessege (\App\Http\Requests\FrontEnd\Messages\Store $request)
    {
      Message::create($request->all());
      alert()->success('Your Message Sent Successfully','Done');
      return redirect()->route('frontend.landing');

    }

    public function welcome()
    {
        $videos = Video::Published()->orderBy('id','desc')->paginate(9);
        $comment_count = Comment::count();
        $tag_count = Tag::count();
         return view('welcome',compact('videos','comment_count','tag_count'));
    }

    public function page($id , $slug = null)
    {
      $page = Page::findOrFail($id);
         return view('front-end.page.index',compact('page'));

    }

    public function profile($id , $slug = null)
    {
       $user = User::findOrFail($id);
        return view('front-end.profile.index',compact('user'));

    }

    public function profileUpdate(\App\Http\Requests\FrontEnd\Users\Store $request)
    {
      $user = User::findOrFail(auth()->user()->id);
      $array = []; 
      if($request->email != $user->email)
      {
          $email = User::where('email',$request->email)->first();
            if ($email == null) {
             $array['email'] = $request->email;
            }
      }

       if($request->name != $user->name)
      {
          $array['name'] = $request->name;
      }

      if($request->password != '')
      {
          $array['password'] = Hash::make($request->password);
      }

      if (!empty($array)) {
        $user->update($array);
      }
      alert()->success('Your Profile Updated Successfully','Done');
      return redirect()->route('front.profile',
      ['id' => $user->id , 'slug' => slug($user->name)]);

    }

    }

