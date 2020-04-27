<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table='obat';
    protected $fillable = [
        'name', 'email', 'password','profesi', 'username', 'admin', 'avatar'
    ];
}
