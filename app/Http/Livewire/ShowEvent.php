<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\EventByUser;
use App\Models\User;
use Livewire\Component;

class ShowEvent extends Component
{
  public $event;
  public $eventId;
  public $hosts;
  public $tableField;
  public $typeEvenement;
  public $userEvents;

  public function render()
  {

    return view('livewire.show-event');
  }

  public function mount()
  {
    $this->userEvents = EventByUser::where('user_id', auth()->id())->pluck('event_id')->toArray();

    // Si pas d'event on affiche l'évènement du jour
    if (!isset($this->eventId)) {
      $this->event = Event::where('Date', date("Y-m-d"))->first();
      if (!isset($this->event)) {
        session()->flash('info',  "Pas d'évènement prévu aujourd'hui");
        return redirect()->route('events.index');
      } else {
        $this->eventId = $this->event->id;
      }
    }

    // Affiche l'évènement si les droits sont suffisants
    if (in_array($this->eventId, $this->userEvents) || auth()->user()->isAdmin()) {
      $this->event = Event::find($this->eventId);
    } else {
      session()->flash('info',  "Pas d'évènement prévu aujourd'hui");
      return redirect()->route('events.index');
    }
  }
}
