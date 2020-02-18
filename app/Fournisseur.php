<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = [
        'name', 'email', 'numero', 'adresse', 'code_postal'
    ];
}
