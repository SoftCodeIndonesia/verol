<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaterialModel;
use App\Models\ImageMaterialModel;
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

        // foreach ($data['materials'] as $key => $value) {
        //     var_dump($value->images[0]->path);
        // }

        // die;
        
        return view('material/material', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['javascript'] = [
            'material/add.js'
        ];
        return view('material.add', $data);
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
            'kode_barang' => 'required',
        ]);

        $material = new MaterialModel();

        $material->name = $request->name;
        $material->stock = $request->stock;
        $material->kode_barang = $request->kode_barang;
        $material->created_by = Auth::user()->id;
        $material->created_at = time();

        $material->save();
        if($request->has('images')){
            foreach ($request->file('images') as $key => $value) {
                if($value != null){
                    $explode = explode('.', $value);
                    
                    $image = new ImageMaterialModel();

                    $imageName = time().'.'. $value->extension();  
                    $value->move(public_path('images/material'), $imageName);

                    $image->material_id = $material->id;
                    $image->path = $imageName;
                    $image->created_at = time();
                    $image->save();
                }
            }
            
        }

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
            'kode_barang' => 'required',
        ]);

        $material = MaterialModel::find($id);

        $material->name = $request->name;
        $material->stock = $request->stock;
        $material->kode_barang = $request->kode_barang;

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