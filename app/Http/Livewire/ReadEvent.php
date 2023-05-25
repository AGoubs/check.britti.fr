<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReadEvent extends Component
{
  public $eventId;

  public function render()
  {
    return view('livewire.read-event');
  }

  public function mount()
  {
  }
}
