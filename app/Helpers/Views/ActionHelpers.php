<?php

use App\Models\TransactionModel;


if(!function_exists('check_status')){
    function check_status(TransactionModel $transactionModel){
        return get_action($transactionModel);
    }
}

if(!function_exists('get_action')){
    function get_action(TransactionModel $transactionModel){
        if(isChecked($transactionModel)){
            return '<div class="alert alert-warning" role="alert">
                Menunggu di periksa ' . isChecker($transactionModel) ;
        }else if(isApproved($transactionModel)){
            return '<div class="alert alert-primary" role="alert">
                Menunggu di approve ' . isApprover($transactionModel) ;
        }else{
            return '<div class="alert alert-success" role="alert">
                Laporan Telah Selesai 
                </div>';
        }
    }
}

if(!function_exists('isApprover')){
    function isApprover(TransactionModel $transactionModel){
       if(Auth::user()->hasDirectPermission('approve transaksi')) {
            return 'oleh Anda!! <span><a href="/transaction/approve/'.$transactionModel->id.'" class="btn btn-sm btn-success float-right">Setujui</a></span>
            </div>';
       } else{
            return '!!</div>';
       }
    }
}
if(!function_exists('isChecker')){
    function isChecker(TransactionModel $transactionModel){
       if(Auth::user()->hasDirectPermission('check transaksi')) {
        return 'oleh Anda!! <span><a href="/transaction/check/'.$transactionModel->id.'" class="btn btn-sm btn-success float-right">Setujui</a></span>
        </div>';
       } else{
        return '!!</div>';
       }
    }
}

if(!function_exists('isChecked')){
    function isChecked(TransactionModel $transactionModel){
        if($transactionModel->checker == null){
            return true;
        }else {
            return false;
        } 
    }
}
if(!function_exists('isApproved')){
    function isApproved(TransactionModel $transactionModel){
        if($transactionModel->approver == null){
            return true;
        }else {
            return false;
        } 
    }
}