<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karya_pengarang extends Model
{
    protected $table = "karya_pengarang";
    protected $primaryKey = "id";
    protected $filllable = [
        'id','nama','karyaPengarang'
    ];
    protected $guarded = [];

}
