<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\BackEnd\Pages\Store;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $pages = Page::where([]);
        if ($request->has('name'))
            $pages = $pages->where('name', 'like', '%' . $request->input('name') . '%');
        $data['pages'] = $pages->paginate(10);
        return view('back-end.pages.index', $data);
    }


     public function create()
    {
    	return view('back-end.pages.create');
    }


     public function store(Store $request)
    {
        $pages = Page::create($request->all());

       alert()->success('Page added Successfully','Done');

          return redirect()->route('pages.index');
    }

    public function edit($id)
    {
    	$pages = Page::findOrFail($id);
    	return view('back-end.pages.edit',compact('pages'));
    }

    public function update(Store $request,$id)
    {
    	$pages = Page::findOrFail($id);

    	$requstArray = $request->all();

        $pages->update($requstArray);

       alert()->success('Page Updated Successfully','Done');

        return redirect()->route('pages.index');
    }

    public function destroy($id)
    {
        $pages = Page::FindOrFail($id)->delete();    
       alert()->success('Page Deleted Successfully','Done');
        return redirect()->route('pages.index');
   

    }
}
