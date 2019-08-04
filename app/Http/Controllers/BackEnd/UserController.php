<?php

namespace App\Http\Controllers\Backend;
use App\Http\Requests\BackEnd\Users\Store;
use App\Http\Requests\BackEnd\Users\Update;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(['permission:add Admin']);
    // }

    public function index(Request $request)
    {
        $users = User::where([]);
        if ($request->has('name'))
            $users = $users->where('name', 'like', '%' . $request->input('name') . '%');
        $data['users'] = $users->paginate(10);

        // $role = Role::create(['name' => 'admin']);
        // $permission = Permission::create(['name' => 'add Admin']);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        // $user = User::find(1);
        // dd($user->getAllPermissions());
        // $user->assignRole(3);

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
          return redirect()->route('users.index')->with('success','Add Successfully');
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

        return redirect()->route('users.index')->with('success','Updated Successfully');
    }

     public function destroy($id)
    {
        $user = User::FindOrFail($id)->delete();    
        return redirect()->route('users.index')->with('success','Deleted Successfully');
   

    }
}
