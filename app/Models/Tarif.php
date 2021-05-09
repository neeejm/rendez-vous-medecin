<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $table = 'tarifs';

    protected $primaryKey = 'tar_id';

    protected $fillable = [
        'doc_id',
        'title',
        'price',
    ];
}
