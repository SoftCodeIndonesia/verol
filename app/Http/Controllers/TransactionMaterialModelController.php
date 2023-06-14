<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionMaterialModelRequest;
use App\Http\Requests\UpdateTransactionMaterialModelRequest;
use App\Models\TransactionMaterialModel;

class TransactionMaterialModelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionMaterialModelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransactionMaterialModelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionMaterialModel  $transactionMaterialModel
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionMaterialModel $transactionMaterialModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionMaterialModel  $transactionMaterialModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionMaterialModel $transactionMaterialModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionMaterialModelRequest  $request
     * @param  \App\Models\TransactionMaterialModel  $transactionMaterialModel
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionMaterialModelRequest $request, TransactionMaterialModel $transactionMaterialModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionMaterialModel  $transactionMaterialModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionMaterialModel $transactionMaterialModel)
    {
        //
    }
}
