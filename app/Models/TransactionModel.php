<?php

namespace App\Models;

use App\Models\User;
use App\Models\MaterialModel;
use Illuminate\Database\Eloquent\Model;
use App\Models\TransactionMaterialModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionModel extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $fillable = [
        'material_id',
        'type',
        'quantity',
        'created_at',
        'prepared_by',
    ];

    protected $nullable = [
      'approved_by',
      'checked_by',
      'prepared_by',
    ];

    public $timestamps = false;

    public function materials(){
        return $this->hasMany(TransactionMaterialModel::class, 'transaction_id');
    }
    public function prepared(){
        return $this->hasOne(User::class, 'id', 'prepared_by');
    }
    public function checker(){
        return $this->hasOne(User::class, 'id', 'checked_by');
    }
    public function approver(){
        return $this->hasOne(User::class, 'id', 'approved_by');
    }


    public function generateId()
    {
      // $id = TransactionModel::all()->las
      $this->unique_id = 'TR' . $this->type .'-WSL000-' . str_pad(count(TransactionModel::all()) + 1, 7, "0", STR_PAD_LEFT);
    }
}