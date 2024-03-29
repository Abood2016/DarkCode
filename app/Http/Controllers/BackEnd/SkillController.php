<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\BackEnd\Skills\Store;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{

	public function index(Request $request)
    {
        $skills = Skill::where([]);
        if ($request->has('name'))
            $skills = $skills->where('name', 'like', '%' . $request->input('name') . '%');
        $data['skills'] = $skills->paginate(5);
        return view('back-end.skills.index', $data);
    }


     public function create()
    {
    	return view('back-end.skills.create');
    }


     public function store(Store $request)
    {
        $skills = Skill::create($request->all());

       alert()->success('Skill Add Successfully','Done');

          return redirect()->route('skills.index');
    }

    public function edit($id)
    {
    	$skills = Skill::findOrFail($id);
    	return view('back-end.skills.edit',compact('skills'));
    }

    public function update(Store $request,$id)
    {
    	$skills = Skill::findOrFail($id);

    	$requstArray = $request->all();

        $skills->update($requstArray);

       alert()->success('Skill Updated Successfully','Done');


        return redirect()->route('skills.index');
    }

    public function destroy($id)
    {
        $skills = Skill::FindOrFail($id)->delete();   
       alert()->success('Skill Deleted Successfully','Done');
        return redirect()->route('skills.index');
   

    }


}
