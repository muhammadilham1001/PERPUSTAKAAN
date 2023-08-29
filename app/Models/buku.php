<?php

namespace App\Models;

use App\Models\Peminjam;
use Illuminate\Database\Eloquent\Model;


class buku extends Model
{
        protected $table = "buku";
        protected $primaryKey = "id";
        protected $fillLable = [
            'id','judul','pengarang','penerbit','genre_id','tahun_terbit','gambar','created_at','updated_at'];
        protected $guarded = [];

       public function genre(){
        return $this->belongsTo(genre::class);
    }

    public function penerbit(){
        return $this->hasMany(penerbit::class);
    }

    public function pengarang(){
        return $this->hasMany(pengarang::class);
    }

    public function Peminjam(){
        return $this->hasMany(Peminjam::class);
    }
}
