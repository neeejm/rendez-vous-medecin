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

    /**
     * Get the calendar that owns the RendezVous
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function calendar(): BelongsTo
    {
        return $this->belongsTo(Calendar::class);
    }

    /**
     * Get all of the detailFile for the RendezVous
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailFile(): HasMany
    {
        return $this->hasMany(Detailfile::class);
    }

    /**
     * Get all of the detailImage for the RendezVous
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailImage(): HasMany
    {
        return $this->hasMany(DetailImage::class);
    }

    /**
     * Get the doctor that owns the RendezVous
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    /**
     * Get the client that owns the RendezVous
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Get the tarif that owns the RendezVous
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tarif(): BelongsTo
    {
        return $this->belongsTo(Tarif::class);
    }
}
