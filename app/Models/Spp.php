<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;
    // protected $table = 'spp';
    protected $guarded = [];
    // protected $fillable = ['tahun','nominal'];

    public function kelas() {
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    public function spp() {
        return $this->belongsTo(Spp::class,'spp_id');
    }
}
