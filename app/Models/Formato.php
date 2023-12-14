<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Autoridad;

class Formato extends Model
{
    use HasFactory;
    protected $fillable = [

        "titulo","urlImagen","urlDocumento"];

        protected $title = "formatos";
    
        public function autoridad()
        {
            return $this->belongsTo(Autoridad::class, 'autoridadId');
        }
        public function tema()
        {
            return $this->belongsTo(Tema::class, 'temaId');
        }
        
}
