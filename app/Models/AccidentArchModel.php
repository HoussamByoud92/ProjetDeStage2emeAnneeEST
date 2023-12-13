<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccidentArchModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'DateArchivage',	'AcciArch',	
    ];
}
