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
  	  $categories = Category::paginate(5);
        return view('back-end.categories.index', compact('categories'));
    }


    public function create()
    {
    	return view('back-end.categories.create');
    }


     public function store(Store $request)
    {
        $category = Category::create($request->all());

       alert()->success('Category Add Successfully','Done');

          return redirect()->route('categories.index');
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
      
       alert()->success('Category Updated Successfully','Done');
      
        return redirect()->route('categories.index');
    }

public function destroy($id)
    {
        $category = Category::FindOrFail($id)->delete();    
       
       alert()->success('Category Deleted Successfully','Done');

        return redirect()->route('categories.index');

    }

}
