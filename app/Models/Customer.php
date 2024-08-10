<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';
    protected $primaryKey = 'id';

    public function sales()
    {
        return $this->belongsTo(Sales::class);
    }

    public function paketLayanan()
    {
        return $this->belongsTo(PaketLayanan::class);
    }
}
