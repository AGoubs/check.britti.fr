<?php

namespace App\Http\Livewire\Auth;

use App\Models\Event;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\User;

class Login extends Component
{
  public $email = '';
  public $password = '';
  public $remember_me = false;

  protected $rules = [
    'email' => 'required',
    'password' => 'required',
  ];

  public function mount()
  {
    if (auth()->user()) {
      redirect('/accueil');
    }
  }
  public function login()
  {
    try {
      DB::connection()->getPdo();
    } catch (\Exception $e) {
      return $this->addError('email', trans("auth.connexion_failed"));
    }

    $credentials = $this->validate();
    if (auth()->attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
      $user = User::where(["email" => $this->email])->first();
      auth()->login($user, $this->remember_me);
      if (auth()->user()->isAdmin()) {
        return redirect()->intended('/accueil');
      } else {
        if (Event::getTodayEventByUser(auth()->id())) {
          return redirect()->route('events.read', [Event::getTodayEventByUser(auth()->id())]);
        } else {
          auth()->logout();
          return $this->addError('email', trans("auth.no_event"));
        }
      }
    } else {
      return $this->addError('email', trans('auth.failed'));
    }
  }

  public function render()
  {
    return view('livewire.auth.login');
  }
}
