<?php

namespace App\Models;

use App\Models\Inventori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
