<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'city', 'email', 'telp',];
    protected $primaryKey = 'id';

    public function major()
    {
        return $this->belongsToMany(Major::class);
    }
}
