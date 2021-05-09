<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialtie extends Model
{
    use HasFactory;

    protected $table = 'specialties';

    protected $primaryKey = 'sp_id';

    protected $fillable = [
        'name',
    ];
}
