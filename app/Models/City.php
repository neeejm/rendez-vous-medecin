<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $primaryKey = 'ci_id';

    protected $fillable = [
        'city',
    ];

    /**
     * Get all of the address for the City
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function address(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
