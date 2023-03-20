<?php

namespace App\Models;

use App\Models\Inventori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    protected $table = 'inventory_type';

    protected $fillable =
    [
        'name',
    ];

    public function inventory()
    {
        return $this->hasOne(Inventori::class);
    }
}
