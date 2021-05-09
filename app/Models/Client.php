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

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
