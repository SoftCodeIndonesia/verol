<?php

namespace App\Models;

use App\Models\User;
use App\Models\MaterialModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionModel extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $fillable = [
        'material_id',
        'type',
        'quantity',
        'user_id',
        'created_at',
    ];

    public $timestamps = false;

    public function material(){
        return $this->belongsTo(MaterialModel::class);
      }
    public function user(){
        return $this->belongsTo(User::class);
      }
}