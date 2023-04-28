<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Host;
use App\Models\TypeEvent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    User::factory()->create([
      'name' => 'Yohan',
      'email' => 'yohan@britti.fr',
      'password' => Hash::make('Yohan123')
    ]);

    User::factory()->create([
      'name' => 'Arnaud Goubier',
      'email' => 'arnaud@goubier.fr',
      'password' => Hash::make('Arnaud123'),
      'role' => 'admin'
    ]);

    TypeEvent::factory()->create([
      'type_event' => 'Basique',
      'fields' => 'Nom,Prénom,Fonction,Téléphone,Commentaire'
    ]);

    Event::factory(1)->create();
    Host::factory(1)->create();
  }
}
