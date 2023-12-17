<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $table = 'donasibuku';

    protected $fillable= ['namaBuku', 'pengarang', 'jumlahBuku', 'fotoBuku', 'user_id', 'category_id'];
}
