<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';

    protected $guarded;

    public function user()
    {
        $this->belongsTo(User::class, 'id_user');
    }
}
