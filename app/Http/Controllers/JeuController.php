<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jeu;
use App\Models\Editeur;

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
    public function tri_commentaire($id)
    {
        $jeu = Jeu::find($id);
        $commentaires = $jeu->commentaire;
        $commentaire_trié = [];
        for ($i = 0; $i <= $jeu->commentaires; $i++){
            $index =0;
            $datecom = $jeu->commentaire[0]->date_com;
            foreach ($commentaires as $commentaire) {
                if ($datecom > $commentaire->date_com) {
                    $datecom = $commentaire->date_com;
                    $commentaire = $commentaire;
                    $c = $index;
                }
                $index++;
            }
            $commentaire_trié[] = $commentaires;
            unset($commentaires[$c]);
        }

        return view('commentaires.tri_commentaire', ['commentaires' => $commentaire_trié]);
    }

    /*public function editeur($edit){
        $jeux = Jeu::all();
        return view('jeux.editeur',['jeux' => $jeux,'edit' => $edit]);
    }*/
    /*public function theme($themes){
        $tem=Theme::WHERE('nom','like', $themes)->get()[0];
        $jeux = Jeu::where('id_theme',$tem->id)->get();
        return view('jeux.theme',['jeux' => $jeux]);
    }
    public function meca($mecha){
        $mech=Mecanique::WHERE('nom','like', $mecha)->get();
        $jeux = Jeu::where('id_mecanique',$mech->id)->get();
        return view('jeux.meca',['jeux' => $jeux]);
    }*/
}
