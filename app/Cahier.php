<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cahier extends Model
{
    protected $fillable = [
        'annee', 'Chef_projet', 'fournisseur', 'date_lancement', 'observation'
    ];
}
