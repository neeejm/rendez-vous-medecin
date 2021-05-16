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

    /**
     * Get the doctor that owns the Tarif
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Get all of the rendezVous for the Tarif
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rendezVous(): HasMany
    {
        return $this->hasMany(RendezVous::class);
    }
}
