<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';
    protected $guarded;

    public function tanggapan()
    {
        $this->belongsTo(Pengaduan::class, 'id_pengaduan');
    }

}
