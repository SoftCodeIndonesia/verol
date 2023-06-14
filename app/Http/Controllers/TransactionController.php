<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaterialModel;
use App\Models\TransactionModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\TransactionMaterialModel;
use Illuminate\Support\Facades\Redirect;

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
        $data['materials'] = MaterialModel::all();
     
        return view('transaction/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request->materials);
        $data['materials'] = $users = DB::table('material')
        ->whereIn('id', $request->materials)
        ->get();
        $data['type'] = $request->type;
        $data['javascript'] = [
            'transaction/add.js'
        ];

        
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
        
        
        $transaction = new TransactionModel();
        $transaction->type = $request->type;
        $transaction->prepared_by = Auth::user()->id;
        $transaction->created_at = time();
        $transaction->generateId();

        $transaction->save();

        foreach ($request->material_id as $key => $value) {
            $material_trans = new TransactionMaterialModel();
            $material_trans->material_id = $value;
            $material_trans->transaction_id = $transaction->id;
            $material_trans->satuan = $request->satuan[$key] ?? '';
            $material_trans->stock = $request->stock[$key] ?? 0;
            $material_trans->actual = $request->actual[$key] ?? 0;
            $material_trans->selisih = $request->selisih[$key] ?? 0;
            $material_trans->created_at = time();

            $material_trans->save();

        };



        return redirect('/transaction')->with('success', 'Berhasil membuat transaksi baru!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionModel  $transactionModel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['transaction'] = TransactionModel::with(['materials', 'prepared', 'checker', 'approver'])->where(['id' => $id])->first();
        $data['data_alert'] = check_status($data['transaction']);
        return view('transaction/detail', $data);
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
    public function check($id)
    {
        $transaction = TransactionModel::find($id);

        $transaction->checked_by = Auth::user()->id;

        $transaction->save();

        return Redirect::route('transaction.show', ['id' => $transaction->id]);

    }
    public function approve($id)
    {
        $transaction = TransactionModel::find($id);

        $transaction->approved_by = Auth::user()->id;

        foreach ($transaction->materials as $key => $value) {
            if($transaction->type == 1){
                $value->material->stock = $value->material->stock + $value->stock;
            }else if($transaction->type == 0){
                $value->material->stock = $value->material->stock - $value->stock;
            }

            $value->material->save();
        }

        $transaction->save();

        return Redirect::route('transaction.show', ['id' => $transaction->id]);

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

        TransactionModel::destroy($id);

        return redirect('/transaction')->with('success', 'Berhasil menghapus transaksi!');;
    }
}