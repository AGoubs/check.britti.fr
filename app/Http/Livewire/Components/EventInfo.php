<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class EventInfo extends Component
{
  public $event;

  public function render()
  {
    return view('livewire.components.event-info');
  }
}
