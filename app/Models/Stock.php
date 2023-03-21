<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'inventory_stock';

    protected $fillable =
    [
        'inventori_id',
        'quantity',
        'color'
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventori::class, 'inventori_id');
    }
}
