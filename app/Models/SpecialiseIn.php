<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialiseIn extends Model
{
    use HasFactory;

    protected $table = 'specialise_in';

    protected $fillable = [
        'doc_id',
        'sp_id',
    ];
}
