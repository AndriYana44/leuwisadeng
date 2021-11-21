<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'tb_kategori';
    protected $guarded = [];

    function posting()
    {
        return $this->hasOne(Posting::class, 'id_kategori');
    }
}
