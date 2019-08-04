<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\BackEnd\Category\Store;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

  public function index(Request $request)
    {
  	  $categories = Category::all();
        return view('back-end.categories.index', compact('categories'));
    }


    public function create()
    {
    	return view('back-end.categories.create');
    }


     public function store(Store $request)
    {
        $category = Category::create($request->all());

          return redirect()->route('categories.index')->with('success','Add Successfully');
    }


     public function edit($id)
    {
        $categories = Category::FindOrFail($id);
        return view('back-end.categories.edit',compact('categories'));

    }

    public function update($id ,Store  $request)
    {
        $categories = Category::FindOrFail($id);

        $requstArray = $request->all();

        $categories->update($requstArray);

        return redirect()->route('categories.index')->with('success','Updated Successfully');
    }

public function destroy($id)
    {
        $category = Category::FindOrFail($id)->delete();    
        return redirect()->route('categories.index')->with('success','Deleted Successfully');

    }

}
