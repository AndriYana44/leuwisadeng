<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'tb_album';
    protected $guarded = [];

    function foto()
    {
        return $this->hasMany(Foto::class, 'id_album');
    }
}
