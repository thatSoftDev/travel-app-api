<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    private $fillable = ['country', 'starts_at', 'ends_at'];

    public function files() 
    {
        return $this->hasMany(File::class);
    }
}
