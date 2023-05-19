<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaterialModel;
use Illuminate\Support\Facades\Auth;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
        //  $this->role = $role;
        //  $this->permission = $permission;
         // $this->middleware(['auth', 'role_or_permission:admin|create role|create permission']);
     }

    public function index()
    {
        $data['materials'] = MaterialModel::all();
        return view('material/material', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('material.add');
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
            'stock' => 'required|numeric',
            'satuan' => 'required',
        ]);

        $material = new MaterialModel();

        $material->name = $request->name;
        $material->stock = $request->stock;
        $material->satuan = $request->satuan;
        $material->created_by = Auth::user()->id;
        $material->created_at = time();

        $material->save();

        return redirect('/material')->with('success', 'Berhasil menambahkan material');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaterialModel  $materialModel
     * @return \Illuminate\Http\Response
     */
    public function show(MaterialModel $materialModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaterialModel  $materialModel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['material'] = MaterialModel::find($id);
        return view('material/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaterialModel  $materialModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'stock' => 'required|numeric',
            'satuan' => 'required',
        ]);

        $material = MaterialModel::find($id);

        $material->name = $request->name;
        $material->stock = $request->stock;
        $material->satuan = $request->satuan;

        $material->save();

        return redirect('/material')->with('success', 'Berhasil mengubah material');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaterialModel  $materialModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MaterialModel::destroy($id);

        return redirect('/material');
    }
}