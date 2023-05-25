<?php

namespace App\Http\Livewire\Host;

use App\Models\Event;
use Livewire\Component;

class Layout extends Component
{
  public $eventId;
  public $event;

  public function render()
  {
    $this->event = Event::getEventById($this->eventId);

    return view('livewire.host.layout');
  }
}
