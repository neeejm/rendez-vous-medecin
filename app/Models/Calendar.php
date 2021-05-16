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

    /**
     * Get the doctor that owns the Calendar
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Get all of the rendezVous for the Calendar
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rendezVous(): HasMany
    {
        return $this->hasMany(RendezVous::class);
    }
}
