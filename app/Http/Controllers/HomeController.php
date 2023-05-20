<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Role $role, Permission $permission)
     {
         $this->middleware('auth');
         $this->role = $role;
         $this->permission = $permission;
         // $this->middleware(['auth', 'role_or_permission:admin|create role|create permission']);
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        
        return view('home', $user);
    }
}