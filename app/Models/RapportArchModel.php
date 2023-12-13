<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RapportArchModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'DateArchivage',	'RappArch',	
    ];
}
