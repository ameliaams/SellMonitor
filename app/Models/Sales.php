<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Sales extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'sales';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_sales',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
