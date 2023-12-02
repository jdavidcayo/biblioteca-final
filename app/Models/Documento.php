<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $fillable = [

        "titulo","tema","acuerdo","sentencia","sintesis","urlimg","urldoc"];
        protected $title = "documentos";
}
