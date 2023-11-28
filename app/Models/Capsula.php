<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capsula extends Model
{
    use HasFactory;

    public function autor()
    {
        return $this->belongsTo(User::class, 'autorId');
    }
}
