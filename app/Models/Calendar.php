<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;

    protected $table = 'calendars';

    protected $primaryKey = 'dt_id';

    protected $fillable = [
        'date_time',
        'is_free',
    ];
}
