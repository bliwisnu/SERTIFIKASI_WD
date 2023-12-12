<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifModel extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $guarded = [];
    // protected $fillable = ['name', 'email', 'password', 'remember_token'];

}
