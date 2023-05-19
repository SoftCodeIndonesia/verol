<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct(Role $role, Permission $permission)
     {
         $this->middleware('auth');
         $this->role = $role;
         $this->permission = $permission;
         // $this->middleware(['auth', 'role_or_permission:admin|create role|create permission']);
     }


    public function index()
    {
        $users = User::all();
        $data['permissions'] = $this->permission::all();
        return view('managements/users/user', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['javascript'] = [
            'user/add-user.js'
        ];
        $data['roles'] = $this->role::all();
        $data['permissions'] = $this->permission::all();
        return view('managements.users.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users',
            'password' => 'required|same:password',
            'password_conf' => 'required|same:password'
        ]);

        // dd($request->all());
        
        $user = new User();
        
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        
        if($request->has('photo')){
            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images/profile'), $imageName);

            $user->foto = $imageName;
        }
        
        $user->assignRole($request->role);
        
        if($request->has('permissions')){
            foreach ($request->permissions as $key => $value) {
                $user->givePermissionTo($value);
            }
        }

        $user->save();

        return redirect('/users')->with('success', 'Berhasil menambahkan user baru');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::find($id);
        
        $data['javascript'] = [
            'user/add-user.js'
        ];
        $data['roles'] = $this->role::all();
        $data['permissions'] = $this->permission::all();

        $data['givePermission'] = [];

        foreach ($data['user']->getAllPermissions()->toArray() as $key => $value) {
            $data['givePermission'][] = $value['name'];
        }

       
        

        return view('managements.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
        ]);

        $user = User::find($id);

        $user->name = $request->name;
        $user->username = $request->username;

        if($request->has('photo')){

            $image_path = "images/profile/" . $user->foto; 
             // Value is not URL but directory file path
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images/profile'), $imageName);

            $user->foto = $imageName;
        }
        
        $user->assignRole($request->role);
        
        if($request->has('permissions')){
            foreach ($request->permissions as $key => $value) {
                $user->givePermissionTo($value);
            }
        }

        $user->save();

        return redirect('/users')->with('success', 'Berhasil mengubah data user');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/users');
    }
}