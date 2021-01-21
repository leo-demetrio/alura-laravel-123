<?php

namespace App\Http\Controllers;

use App\Series;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index(int $id)
    {
        $serie = Series::find($id);
        $serieTemp = $serie->temporadas;

        return view('temporadas.index', compact('serieTemp','serie'));
    }
}
