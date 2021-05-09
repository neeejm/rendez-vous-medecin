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

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
