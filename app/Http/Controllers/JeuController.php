<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jeu;
use App\Models\Editeur;
use App\Models\Theme;
use App\Models\Mecanique;

class JeuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeux = Jeu::all();
        return view('jeux.index', ['jeux' => $jeux]);
    }
    public function randomJeu()
    {
        $jeux = [];
        for ($i = 0; $i <= 4;$i++){
            $n = rand(0,count(Jeu::all()->toArray()));
            $jeu = Jeu::find($n);
            $jeux[] = $jeu;
        }
        return view('jeux.random', ['jeux' => $jeux]);
    }
    public function regle($id){
        $jeu = Jeu::find($id);
        return view('jeux.regle',['jeu' => $jeu]);
    }
    public function show($id){
        $jeu = Jeu::find($id);
        $coms = $jeu->commentaires;
        return view('jeux.show',['jeu' => $jeu,'coms' => $coms]);
    }
    public function tri(){
        $jeux = Jeu::all()->sortBy('nom');
        return view('jeux.tri', ['jeux' => $jeux]);
    }

    public function editeur($edit){
        $jeux = Jeu::all();
        return view('jeux.editeur',['jeux' => $jeux,'edit' => $edit]);
    }

    public function theme($theme){
        $jeux = Jeu::all();
        return view('jeux.theme',['jeux' => $jeux,'theme' => $theme]);
    }

    public function mecanique($meca){
        $jeux = Jeu::all();
        return view('jeux.mecanique',['jeux' => $jeux,'meca' => $meca]);
    }
}
