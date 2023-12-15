<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanModel extends Model
{
    public function table_alat()
    {
        return $this->belongsTo(AlatModel::class, "alat_id");
    }
    protected $table = "table_peminjaman";
    protected $guarded = [];
}
