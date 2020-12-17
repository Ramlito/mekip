<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Models\Jeu;
use App\Models\Editeur;
use App\Models\Theme;
use App\Models\Mecanique;
use Illuminate\Support\Facades\Auth;

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
        $mecaniques = Mecanique::all();
        $themes = Theme::all();
        $edits = Editeur::all();
        return view('jeux.index', ['jeux' => $jeux,'mecaniques' => $mecaniques,'themes' => $themes,'edits' => $edits]);
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
        $commentaires = $jeu->commentaires->toArray();
        $commentaire_trie = [];
        for ($i = 0; $i <= count($jeu->commentaires); $i++){
            $index =0;
            $datecom = $jeu->commentaires[1]->date_com;
            foreach ($commentaires as $commentaire) {
                if ($datecom > $commentaire["date_com"]) {
                    $datecom = $commentaire["date_com"];
                    $com = $commentaire;
                }
                $index++;
            }
            $commentaire_trie[] = $com;
            unset($commentaires[array_search($com, $commentaires)]);
        }

        return view('commentaires.tri_commentaire', ['commentaires' => $commentaire_trie]);
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

    public function editeur(Request $request){
        $jeux = Jeu::all();
        return view('jeux.editeur',['jeux' => $jeux,'edit' => $request->nomEditeur]);
    }

    public function theme(Request $request){
        $jeux = Jeu::all();
        return view('jeux.theme',['jeux' => $jeux,'theme' => $request->nomTheme]);
    }

    public function mecanique(Request $request){
        $jeux = Jeu::all();
        return view('jeux.mecanique',['jeux' => $jeux,'meca' => $request->nomMeca]);
    }
    public function ajouterComment($jid){
        return view('jeux.ajouterComment',['jid'=>$jid]);
    }
    public function storeComment(Request $request ,$jid){
        $validated = $request->validate([
            'commentaire' => 'required|max:255',
            'note' => 'required|numeric',
        ]);
        if(Jeu::find($jid) == null){
            return abort(404);
        }
        $user = Auth::id();
        $commentaire = new Commentaire();
        $commentaire->commentaire = $request->commentaire;
        $commentaire->date_com = date("Y-m-d H:i:s");
        $commentaire->note = $request->note;
        $commentaire->jeu_id = $jid;
        $commentaire->user_id=$user;
        $commentaire->save();
        return view('accueil');
    }
}
