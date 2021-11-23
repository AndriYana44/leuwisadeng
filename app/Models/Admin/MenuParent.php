<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuParent extends Model
{
    use HasFactory;
    protected $table = 'tb_menu_parent';
    protected $guarded = [];

    function child()
    {
        return $this->hasMany(Menu::class, 'id_parent');
    }

    function halaman()
    {
        return $this->belongsTo(Halaman::class, 'id_halaman');
    }
}
