<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruang extends Model
{
    use HasFactory; 
    
    use SoftDeletes;
    
    protected $table = "ruang";

    protected $fillable = ['nama','kode_ruang','keterangan'];
}
