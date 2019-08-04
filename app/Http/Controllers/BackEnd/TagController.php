<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\BackEnd\tags\Store;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::where([]);
        if ($request->has('name'))
            $tags = $tags->where('name', 'like', '%' . $request->input('name') . '%');
        $data['tags'] = $tags->paginate(10);
        return view('back-end.tags.index', $data);
    }


     public function create()
    {
    	return view('back-end.tags.create');
    }


     public function store(Store $request)
    {
        $tags = Tag::create($request->all());

          return redirect()->route('tags.index')->with('success','Add Successfully');
    }

    public function edit($id)
    {
    	$tags = Tag::findOrFail($id);
    	return view('back-end.tags.edit',compact('tags'));
    }

    public function update(Store $request,$id)
    {
    	$tags = Tag::findOrFail($id);

    	$requstArray = $request->all();

        $tags->update($requstArray);

        return redirect()->route('tags.index')->with('success','Updated Successfully');
    }

    public function destroy($id)
    {
        $tags = Tag::FindOrFail($id)->delete();    
        return redirect()->route('tags.index')->with('success','Deleted Successfully');
   

    }
}
