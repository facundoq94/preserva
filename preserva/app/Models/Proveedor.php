<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    use HasFactory;
    protected $fillable = ['usuario', 'proveedor', 'tipo', 'cuitdni', 'condicioniva', 'telefono', 'domicilio', 'ciudad', 'provincia', 'email'];

}
