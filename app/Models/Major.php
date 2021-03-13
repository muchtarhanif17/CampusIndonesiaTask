<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $primaryKey = 'id';

    public function institute()
    {
        return $this->belongsToMany(Institute::class);
    }
}
