<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddHost extends Component
{
  public $eventId;

  public function render()
  {
    return view('livewire.add-host');
  }

  public function mount()
  {
  }

  public function submit()
  {
    return redirect()->route('events.show', $this->eventId);
  }

  public function editEvent()
  {
    redirect()->route('events.edit', $this->eventId);
  }
}
