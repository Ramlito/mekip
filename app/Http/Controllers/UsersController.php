<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Jeu;

class UsersController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        return view('user.index', ['users' => $users]);

    }

    public function collection(){
        $uid = Auth::id();
        $user = User::find($uid);
        $collection = [];
        foreach ($user->ludo_perso as $achat){
            $jeu = $achat;
            array_push($collection, $jeu);
        }
        return view('user.collection',['collection' => $collection]);
    }

    public function suppression($jid){
        $user = Auth::user();
        $user->ludo_perso()->detach($jid);
    }

    public function ajouterAchat($jid){
        return view('user.ajouterJeu',['jid'=>$jid]);
    }

    public function storeAchat(Request $request ,$jid){
        $user = Auth::user();
        $user->ludo_perso()->attach($jid,['prix'=> $request->prix, 'date_achat'=> $request->dateAchat, 'lieu'=>$request->lieu]);
    }
}
