<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'inventory_stocks';

    protected $fillable =
    [
        'inventory_id',
        'quantity',
        'color'
    ];

    public function inventory()
    {
        return $this->belongsTo(Inventori::class, 'inventory_id');
    }
}
