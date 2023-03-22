<?php

namespace App\Models;

use App\Models\Type;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventori extends Model
{
    use HasFactory;
    protected $table = 'inventories';

    protected $fillable =
    [
        'user_id',
        'name',
        'description',
        'inventory_type_id'
    ];

    public function inventoryType()
    {
        return $this->belongsTo(Type::class, 'inventory_type_id');
    }

    public function inventoryStock()
    {
        return $this->hasMany(Stock::class, 'inventory_id');
    }
}
