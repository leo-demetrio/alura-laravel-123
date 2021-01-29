<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    protected $fillable = ['numero','assistidos'];  
    
    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }
}
