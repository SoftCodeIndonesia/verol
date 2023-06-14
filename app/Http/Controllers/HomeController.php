<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MaterialModel;
use App\Models\TransactionModel;
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

        $data['transaction_out'] = TransactionModel::where('type', 0)->get();
        $data['transaction_in'] = TransactionModel::where('type', 1)->get();
        $data['users'] = User::all();
        $data['materials'] = MaterialModel::all();
        $data['user'] = $user;
        return view('home', $data);
    }
}