<?php

namespace App\Models;

use App\Models\buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjam extends Model
{
    protected $table = "peminjam";
    protected $primaryKey = "id";
    protected $filllable = [
        'id','nama','jenis_kelamin', 'wa', 'alamat','   ', 'tanggal_pinjam', 'tanggal_pengembalian', 'status'
    ];
    protected $guarded = [];

    public function buku(){
        return $this->belongsTo(buku::class);
    }
}
