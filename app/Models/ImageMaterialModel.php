<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageMaterialModel extends Model
{
    use HasFactory;

    protected $table = 'material_image';

    protected $fillable = [
        'matrial_id',
        'path',
        'created_at',
    ];

    public $timestamps = false;
}