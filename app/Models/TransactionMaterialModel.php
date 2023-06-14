<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionMaterialModel extends Model
{
    use HasFactory;

    protected $table = 'material_transaction';


    public $timestamps = false;

    public function material(){
        return $this->hasOne(MaterialModel::class, 'id', 'material_id');
    }
}