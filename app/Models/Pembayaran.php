<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';
    protected $fillable = [
        'nama'
    ];

    public function history_order()
    {
        return $this->hasMany(HistoryOrder::class, 'id_pembayaran', 'id');
    }
}
