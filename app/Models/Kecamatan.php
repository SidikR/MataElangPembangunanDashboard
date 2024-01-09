<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'data_kecamatan';
    // protected $primaryKey = 'id_kecamatan';
    protected $fillable = [
        'id_kecamatan',
        'id_kabupaten',
        'name',
    ];
}
