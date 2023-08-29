<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengarang extends Model
{
    protected $table = "pengarang";
    protected $primaryKey = "id";
    protected $filllable = [
        'id', 'pengarang_id', 'jenis_kelamin', 'alamat', 'karya_id'
    ];
    protected $guarded = [];

     public function buku(){
        return $this->belongsTo(buku::class, 'pengarang_id');
     }
}
