<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailFile extends Model
{
    use HasFactory;

    protected $table = 'detail_files';

    protected $primaryKey = 'df_id';

    protected $fillable = [
        'rv_id',
        'file',
    ];

    /**
     * Get the rendezVous that owns the DetailFile
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rendezVous(): BelongsTo
    {
        return $this->belongsTo(RendezVous::class);
    }
}
