<?php

namespace App\Http\Livewire\Components;

use App\Models\EventByUser;
use App\Models\User;
use Livewire\Component;

class EventsUsersTable extends Component
{
  public $users;
  public $eventId;

  public function render()
  {
    $usersIds = EventByUser::where('event_id', $this->eventId)->pluck('user_id')->toArray();
    if ($usersIds) {
      foreach ($usersIds as $userId) {
        $this->users[] = User::where('id', $userId)->first();
      }
    }
    return view('livewire.components.events-users-table');
  }

  public function selectEvent($userId)
  {
    return redirect()->route('users-events.index', ['userId' => $userId]);
  }
}
