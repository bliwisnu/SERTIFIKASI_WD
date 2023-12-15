<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatModel extends Model
{
    use HasFactory;
    protected $table = "table_alat";
    protected $guarded = [];
    // protected $fillable = ['nama_alat', 'harga_alat', 'input_gambar'];
}
