<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;

    protected $table = 'rendez_vous';

    protected $primaryKey = 'rv_id';

    protected $fillable = [
        'doc_id',
        'tar_id',
        'client_id',
        'dt_id',
        'reasons',
        'doc_detail',
        'state',
    ];
}
