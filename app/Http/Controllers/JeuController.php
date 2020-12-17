<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jeu;

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
        return view('jeux.show',['jeu' => $jeu]);
    }
    public function tri(){
        $jeux = Jeu::all()->sortBy('nom');
        return view('jeux.tri', ['jeux' => $jeux]);
    }

    public function prix($id){
        $jeu = Jeu::find($id);
        $nbJoueurs = 0;
        $max = 0.0;
        $min = 999999999999999.9;
        $moyenne = 0.0;
        $prix = [];
        foreach($jeu->acheteurs as $element){
            $prixElement = $element -> achat -> prix;
            $prix[] = $prixElement;
            $nbJoueurs++;
        }
        foreach($prix as $element){
            if($element > $max){
                $max = $element;
            }
        }
        foreach($prix as $element){
            if($element < $min){
                $min = $element;
            }
        }
        foreach($prix as $element){
            $moyenne += $element;
        }

        $moyenne = $moyenne / sizeof($prix);

        $noteMin = 999999999999999;
        $noteMax = 0;
        $noteMoyenne = 0;
        $listeNote = [];
        $nbCommentaires = 0;

        foreach($jeu -> commentaires as $element){
            $nbCommentaires++;
            $note = $element -> note;
            $listeNote[] = $note;
        }

        foreach($listeNote as $note){
            if($note > $noteMax){
                $noteMax = $note;
            }
        }

        foreach($listeNote as $note){
            if($note < $noteMin){
                $noteMin = $note;
            }
        }

        foreach($listeNote as $note){
            $noteMoyenne += $note;
        }

        if (sizeof($listeNote) != 0){
            $noteMoyenne = $noteMoyenne / sizeof($listeNote);
        }
        else{
            $notemoyenne = 0;
            $noteMin = "Non défini";
            $noteMax = "Non défini";
            $noteMoyenne = "Non défini";
        }

        $nbCommentairesTotal = 0;
        $jeux = Jeu::all();
        foreach($jeux as $element){
            foreach($element -> commentaires as $com){
                $nbCommentairesTotal++;
            }
        }

        return view('jeux.prix', ['jeu' => $jeu,
            'min' => $min, 'max' => $max,
            'moyenne' => $moyenne,
            'nbJoueurs' => $nbJoueurs,
            'noteMin' => $noteMin,
            'noteMax' => $noteMax,
            'noteMoyenne' => $noteMoyenne,
            'nbCommentaires' => $nbCommentaires,
            'nbCommentairesTotal' => $nbCommentairesTotal,
            'jeux' => $jeux,
            ]);
    }
}
