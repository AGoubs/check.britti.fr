<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $guarded = [];

  public static function getEventById($eventId)
  {
    return Event::where('id', $eventId)->first();
  }

  public static function getTodayEventByUser($userId)
  {
    $event_by_user = EventByUser::where('user_id', $userId)->get();

    foreach ($event_by_user as $event) {
      $current_event = self::getEventById($event->event_id);
      if (date("Y-m-d") == $current_event->Date) {
        return self::getEventById($event->event_id);
      }
    }
    return false;
  }
}
