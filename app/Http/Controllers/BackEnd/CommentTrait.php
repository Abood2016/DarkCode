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
	return redirect()->route('videos.edit',['id' => $requestArray['video_id'] , '#comments'])->with('success','Comment Add ');
}

	public function destroyComment($id)
	{	

		$comment = Comment::find($id);
		$comment->delete();	
		return redirect()->route('videos.edit',['id' => $comment->video_id , '#comments'])->with('success','Comment Deleted ');
	}

	public function UpdateComment($id , Store $request)
	{	
		$comment = Comment::find($id);
		$comment->update($request->all());	
		return redirect()->route('videos.edit',['id' => $comment->video_id , '#comments'])->with('success','Comment Updated ','#comments');
	}

}