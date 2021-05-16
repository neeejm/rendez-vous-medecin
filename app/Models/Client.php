<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $primaryKey = 'client_id';

    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'phone_num',
        'gender',
    ];

    /**
     * Get the user that owns the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the rendezVous for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rendezVous(): HasMany
    {
        return $this->hasMany(RendezVous::class);
    }
}
