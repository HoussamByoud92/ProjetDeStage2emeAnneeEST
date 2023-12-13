<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccidentModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'Date',	'Redigeant',	'categorie',	'division',	'chantier',	'LieuEve',	'heure',	'LieuEve',	'signalant',	'nTele',	'NatureDomm',	'SiegeDomme',	'Description',	'IDVictime',	'DateNaiss'	,'DateEmb',	'Matricule',	'Fonction',	'Temoignages',	'DescAcci',	'Risques',	'Chronologie',	'ActionsRec'
    ];
}
