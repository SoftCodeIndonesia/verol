<?php

namespace App\Models;

use App\Models\ImageMaterialModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterialModel extends Model
{
    use HasFactory;

    protected $table = 'material';

    protected $fillable = [
        'kode_barang',
        'name',
        'stock',
    ];

    public $timestamps = false;


    public function images(){
        return $this->hasMany(ImageMaterialModel::class, 'id');
    }

}