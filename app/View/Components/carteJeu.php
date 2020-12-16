<?php

namespace App\View\Components;

use App\Models\Jeu;
use Illuminate\View\Component;

class carteJeu extends Component
{
    public $jeu;
    public function __construct(Jeu $jeu)
    {
        $this->jeu = $jeu;
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
