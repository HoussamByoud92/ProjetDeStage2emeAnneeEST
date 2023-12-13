<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InciArchModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'DateArchivage',	'InciArch',	
    ];
}
