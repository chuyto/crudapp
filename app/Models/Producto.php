<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Producto extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'sku',
        'image',
    ];
}
