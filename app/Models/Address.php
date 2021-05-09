<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'addresses';

    protected $primaryKey = 'adr_id';

    protected $fillable = [
        'doc_id',
        'city',
        'zip',
        'address',
    ];

}
