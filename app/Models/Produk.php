<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['nama_produk', 'harga_produk', 'stok_produk', 'detail_produk', 'foto_produk'];

    // Define the relationship with the Order model
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}

