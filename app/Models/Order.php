<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Define the relationship with the Produk model
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
