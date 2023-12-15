<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlatModel extends Model
{
    use HasFactory;
    protected $table = "table_alat";
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Kategori::class, 'alat_kategori', 'alat_catalogue_id', 'category_id');
    }
}

