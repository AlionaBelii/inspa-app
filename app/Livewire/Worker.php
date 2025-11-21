<?php

namespace App\Livewire;

use Livewire\Component;

class Worker extends Component
{
    public $worker;

    public function mount($worker)
    {
        $this->worker = $worker;
    }
    public function render()
    {
        return view('livewire.worker', ["worker" => $this->worker]);
    }
}
