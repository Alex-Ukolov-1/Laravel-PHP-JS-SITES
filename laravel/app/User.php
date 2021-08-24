<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\PasswordReset;

class User extends Authenticatable {
  use Notifiable;

  protected $fillable = ['name', 'email', 'password', 'role'];
  protected $hidden = ['password', 'remember_token'];

  public function articles() {
    return $this->hasMany("App\Article", "author", "id");
  }

  public function files() {
    return $this->hasMany("App\File", "user", "id");
  }

  public function sendPasswordResetNotification($token) {
    $this->notify(new PasswordReset($token));
  }

  public function getFriendlyRoleAttribute() {
    switch ($this->attributes["role"]) {
      case "a":
        return "Автор";
        break;
      case "e":
        return "Редактор";
        break;
      case "m":
        return "Администратор";
        break;
    }
  }
}
