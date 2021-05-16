<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';

    protected $primaryKey = 'doc_id';

    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'phone_num',
        'fax_num',
        'gender',
        'img', 
        'comment',
    ];

    /**
     * Get the user that owns the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the tarif for the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tarif(): HasMany
    {
        return $this->hasMany(Tarif::class);
    }

    /**
     * The specialtie that belong to the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function specialtie(): BelongsToMany
    {
        return $this->belongsToMany(Specialtie::class);
    }

    /**
     * Get all of the calendar for the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function calendar(): HasMany
    {
        return $this->hasMany(Calendar::class);
    }

    /**
     * Get the address associated with the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address(): HasOne
    {
        return $this->hasOne(Address::class);
    }

    /**
     * Get all of the rendezVous for the Doctor
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rendezVous(): HasMany
    {
        return $this->hasMany(RendezVous::class);
    }
}
