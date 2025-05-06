<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan oleh model ini (optional, jika nama tabel sesuai dengan konvensi tidak perlu ditulis)
    protected $table = 'categories';

    // Kolom yang dapat diisi mass-assignment
    protected $fillable = [
        'name',
    ];

    // Relasi dengan model Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
