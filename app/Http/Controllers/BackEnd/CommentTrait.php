<?php

namespace App\Http\Controllers\BackEnd;
use App\Http\Requests\BackEnd\Comment\Store;
use App\Models\Comment;
use Illuminate\Http\Request;

trait CommentTrait{

public function commentStore(Store $request)
{	

	$requestArray = $request->all() + ['user_id' => auth()->user()->id];
	Comment::create($requestArray);
    
       alert()->success('Comment Add Successfully','Done');

	return redirect()->route('videos.edit',['id' => $requestArray['video_id'] , '#comments']);
}

	public function destroyComment($id)
	{	
		$comment = Comment::FindOrFail($id);

    try {
    $comment = Comment::where('id',$id)->first();
  } catch (ModelNotFoundException $e) {
       alert()->error('Comment not Found','Error');
    return redirect()->back();
  }
  	$comment->delete();
    alert()->success('Comment Deleted Successfully','Done');
       
     return redirect()->route('videos.edit',['id' => $comment->video_id , '#comments']);  
    }
	
		
	public function UpdateComment($id , Store $request)
	{	
		$comment = Comment::FindOrFail($id);
		$comment->update($request->all());	
       
       alert()->success('Comment Updated Successfully','Done');

		return redirect()->route('videos.edit',['id' => $comment->video_id , '#comments']);
	}

}