<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;

    protected $table = 'konsumens';
    protected $fillable = [
        'nama',
        'alamat',
        'no_hp',
    ];

    public function history_order()
    {
        return $this->hasMany(HistoryOrder::class, 'id_konsumen', 'id');
    }

}
