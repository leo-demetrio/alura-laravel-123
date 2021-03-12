<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    protected $table = 'series';
    public $timestamps = false;
    protected $fillable = ['nome','capa'];

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}