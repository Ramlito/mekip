<?php


namespace App\Http\Controllers;


use App\Models\Editeur;
use App\Models\Jeu;
use App\Models\Mecanique;
use App\Models\Theme;

class HomeController
{
    public function index()
    {
        return view('accueil');
    }
}
