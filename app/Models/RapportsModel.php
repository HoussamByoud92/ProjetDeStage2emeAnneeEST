<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapportsModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'Date',	'CoupFort',	'CoupProg',	'DureeCF',	'DureeCP',	'PartieHT',	'PartiemT',	'nbPannesBT',	'nbInciBT',	'nbRedMT',	'nbInciMT',	'nbPosteiCP',	'nbtronciCP',	'Temp1',	'CosPhi1'	,'S1',	'Heure1',	'TotalEkwh1',	'ImaxDep1',	'Temp2',	'CosPhi2',	'S2',	'Heure2',	'TotalEkwh2',	'ImaxDep2',	'Temp3',	'CosPhi3',	'S3',	'Heure3',	'TotalEkwh3',	'ImaxDep3'
    ];
}
