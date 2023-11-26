<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Capsula;


class Capsulas extends Component
{

    public function render()
    {
        $capsulas = Capsula::all();
        return view('livewire.capsulas', compact('capsulas'));
    }
}
