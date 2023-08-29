<?php

namespace App\Models;

use App\Models\buku;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class penerbit extends Model
{
    protected $table = "penerbit";
    protected $primaryKey = "id";
    protected $filllable = [
        "id","penerbit_id","terbitan_populer","alamat"
    ];
    protected $guarded = [];

     public function buku(){
        return $this->belongsTo(buku::class, 'penerbit_id');
     }
}
