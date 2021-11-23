<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'tb_menu';
    protected $guarded = [];

    function parent()
    {
        return $this->belongsTo(MenuParent::class, 'id_parent', 'id');
    }

    function halaman()
    {
        return $this->belongsTo(Halaman::class, 'id_halaman', 'id');
    }
}
