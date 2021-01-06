<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    private $fillable = ['name'];

    public function trip() 
    {
        return $this->belongsTo(Trip::class);
    }
}
