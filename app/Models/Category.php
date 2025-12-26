<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'slug',        // ⬅️ WAJIB DITAMBAHKAN
        'deskripsi',
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id');
    }
}
