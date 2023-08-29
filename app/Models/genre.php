<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    protected $table = "genre";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','genre'
    ];

    public function buku(){
        return $this->hasMany(buku::class);
    }
}
