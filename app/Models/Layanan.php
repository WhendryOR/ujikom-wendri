<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanans';
    protected $fillable = [
        'nama',
        'harga',
    ];

    public function history_order()
    {
        return $this->hasMany(HistoryOrder::class, 'id_layanan', 'id');
    }
}
