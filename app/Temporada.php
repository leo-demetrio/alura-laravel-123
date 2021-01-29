<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Episodio;

class Temporada extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;
    
    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }
    public function serie()
    {
        return $this->belongsTo(Seires::class);
    }
    public function getEpisodiosAssistidos(): Collection
    {
        return $this->episodios->filter(function (Episodio $episodio) {
            return $episodio->assistidos;
        });
    }
}
