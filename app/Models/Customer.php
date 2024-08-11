<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_sales',
        'id_paket',
        'nama_customer',
        'tgl_gabung',
    ];

    // Define relationships
    public function sales()
    {
        return $this->belongsTo(Sales::class, 'id_sales');
    }

    public function paketLayanan()
    {
        return $this->belongsTo(PaketLayanan::class, 'id_paket');
    }
}
