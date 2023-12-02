<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compendio extends Model
{
    use HasFactory;
    protected $fillable = [

        "criterio","anio","autor","area","identificacion","sintesis","urlPDF"];

        protected $title = "compendios";
        
}
