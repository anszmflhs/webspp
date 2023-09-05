<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BayarSekarang extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function kelas()
        {
            return $this->belongsTo(Kelas::class,'kelas_id');
        }
        public function user()
        {
            return $this->belongsTo(User::class,'user_id');
        }
        public function spp()
        {
            return $this->belongsTo(Spp::class,'spp_id');
        }
}
