<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{


    public function index(Request $request)
    {
        $users = User::where([]);
        if ($request->has('name'))
            $users = $users->where('name', 'like', '%' . $request->input('name') . '%');
        $data['users'] = $users->paginate(10);

        return view('back-end.users.index', $data);
    }
    

    
    public function create()
    {
    	return view('back-end.users.create');
    }

     public function store(Store $request)
    {
        $requestArray = $request->all();

        $requestArray['password'] = Hash::make($requestArray['password']);
    	 
    	 $user = User::create($requestArray);
       alert()->success('User Added Successfully','Done');

          return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $users = User::FindOrFail($id);
        return view('back-end.users.edit',compact('users'));

    }

    public function update($id ,Update  $request)
    {
        $users = User::FindOrFail($id);

        $requestArray = $request->all();

        if(isset($requestArray['password']) && $requestArray['password'] != "")
        {
        $requestArray['password'] = Hash::make($requestArray['password']);
        
        }else{
            unset($requestArray['password']);
        }

        $users->update($requestArray);

       alert()->success('User Successfully','Done');

        return redirect()->route('users.index');
    }

     public function destroy($id)
    {
        $user = User::FindOrFail($id)->delete();    
       alert()->success('User Deleted Successfully','Done');

        return redirect()->route('users.index');
   

    }
}
