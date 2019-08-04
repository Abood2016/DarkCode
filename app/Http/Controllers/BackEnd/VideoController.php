<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\BackEnd\Videos\Store;
use App\Http\Requests\BackEnd\Videos\Update;
use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Comment;
use App\Models\Category;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{

  use CommentTrait;  

  public function index()
	{
	 $videos = Video::all();
        
      return view('back-end.videos.index',compact('videos'))->with('category','user');
    }

    public function create()
    {
        $categories = Category::get();
        $skills = Skill::get();
    	$tags = Tag::get();
    	return view('back-end.videos.create',compact('categories','skills','tags'));
    }

    public function edit($id)
    {
    	$videos = Video::find($id);
    	$categories = Category::get();
        $skills = Skill::get();
        $tags = Tag::get();
        $comments = $videos->comments()->orderBy('id','desc')->with('user')->get();
    
        return view('back-end.videos.edit',
        compact('categories','videos','skills','tags','comments'));
        
    }


      public function store(Store $request)
    {

        $file  = $request->file('image');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin_uploads') , $fileName);

        $requstArray = ['user_id' => auth()->user()->id , 'image' => $fileName] + $request->all() ;   
       
        $videos = Video::create($requstArray);

        if (isset($requstArray['skills']) && !empty($requstArray['skills'])){
            $videos->skills()->sync($requstArray['skills']);
        }

        if (isset($requstArray['tags']) && !empty($requstArray['tags'])){
            $videos->tags()->sync($requstArray['tags']);
        }

       return redirect()->route('videos.index')->with('success','Add Successfully');
    }


    public function update(Update $request,$id)
    {
        $videos = Video::findOrFail($id);
    	
        $requstArray = $request->all();


     if($request->hasFile('image')) {
        $file  = $request->file('image');
        $fileName = time().str_random('10').'.'.$file->getClientOriginalExtension();
        $file->move(public_path('admin_uploads') , $fileName);
        $requstArray = ['image' => $fileName] + $requstArray; 
        }

        $videos->update($requstArray);

            if (isset($requstArray['skills']) && !empty($requstArray['skills'])){
                $videos->skills()->sync($requstArray['skills']);
            }

             if (isset($requstArray['tags']) && !empty($requstArray['tags'])){
                $videos->tags()->sync($requstArray['tags']);
            }

        return redirect()->route('videos.index')->with('success','Updated Successfully');
    }

    public function destroy($id)
    {
        $videos = Video::FindOrFail($id)->delete();    
        return redirect()->route('videos.index')->with('success','Deleted Successfully');
   

    }
}
