<?php

namespace App\Http\Livewire\Components\Tables;

use App\Models\Event;
use Livewire\Component;

class TodayEvent extends Component
{
  public $todayEvent;

  public function render()
  {
    $this->todayEvent = Event::where('Date', date("Y-m-d"))->first();

    return view('livewire.components.tables.today-event');
  }
}
