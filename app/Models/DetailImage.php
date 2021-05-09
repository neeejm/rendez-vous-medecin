<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailImage extends Model
{
    use HasFactory;

    protected $table = 'detail_images';

    protected $primaryKey = 'di_id';

    protected $fillable = [
        'rv_id',
        'img',
    ];
}
