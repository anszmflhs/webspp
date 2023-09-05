<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    // protected $table = 'petugas';
    protected $guarded = [];

    // protected $fillable = ['username','password','nama_petugas','level'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
