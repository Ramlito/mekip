<?php

namespace App\View\Components;

use App\Models\Jeu;
use Illuminate\View\Component;

class carteJeu extends Component
{
    public $photo, $nom, $editeur, $theme, $mecaniques;
    public function __construct(Jeu $jeu)
    {
        $this->photo = $jeu->url_media;
        $this->nom = $jeu->nom;
        $this->editeur = $jeu->editeur;
        $this->theme = $jeu->theme;
        $this->mecaniques = $jeu->mecaniques;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.carte-jeu');
    }
}
