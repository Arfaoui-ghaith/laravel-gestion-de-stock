<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    protected $fillable = [
        'annee', 'title', 'numero_cahier', 'etat'
    ];
}
