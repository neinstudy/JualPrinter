<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['id_produk', 'id_user', 'nama_pemesan', 'no_telpon', 'kode_pos', 'count', 'alamat_pemesan', 'status', 'total'];


    // Define the relationship with the Produk model
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
