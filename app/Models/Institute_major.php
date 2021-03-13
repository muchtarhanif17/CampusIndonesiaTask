<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institute_major extends Model
{
    use HasFactory;
    protected $table = 'institute_major';
    protected $fillable = ['id', 'institute_id', 'major_id'];

    public function institute()
    {
        return $this->hasMany(Institute::class);
    }

    public function major()
    {
        return $this->hasMany(Major::class);
    }
}
