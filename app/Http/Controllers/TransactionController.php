<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaterialModel;
use App\Models\TransactionModel;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
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
        $data['transactions'] = TransactionModel::all();
        
        return view('transaction/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['materials'] = MaterialModel::all();
        return view('transaction/add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material = MaterialModel::find($request->material);

        $this->validate($request, [
            'material' => 'required',
            'type' => 'required',
            'quantity' => 'required|numeric|min:1',
        ]);

        if($request->type == 0 && $material->stock < $request->quantity){
            return redirect('/transaction')->with('error', 'Stock material tidak mencukupi!');
        }else{

            $transaction = new TransactionModel();

            $transaction->material_id = $material->id;
            $transaction->quantity = $request->quantity;
            $transaction->type = $request->type;
            $transaction->user_id = Auth::user()->id;
            $transaction->created_at = time();

            $transaction->save();

            if($request->type == 1){
                $material->stock = $material->stock + $request->quantity;
            }else{
                $material->stock = $material->stock - $request->quantity;
            }
            $material->save();
            return redirect('/transaction')->with('success', 'Berhasil membuat transaksi baru!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionModel  $transactionModel
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionModel $transactionModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionModel  $transactionModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionModel $transactionModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionModel  $transactionModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionModel $transactionModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionModel  $transactionModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transactionModel = TransactionModel::find($id);

        $material = MaterialModel::find($transactionModel->material->id);

        $material->stock = $material->stock - $transactionModel->quantity;

        $material->save();

        TransactionModel::destroy($id);

        return redirect('/transaction')->with('success', 'Berhasil menghapus transaksi!');;
    }
}