<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';

    protected $fillable = [
        'nip',
        'name',
        'placeofbirth',
        'address',
        'dateofbirth' ,
        'gender',
        'gol' ,
        'eselon',
        'position' ,
        'placeoftask',
        'religion',
        'workunit',
        'nohp',
        'npwp',
    ];
}
