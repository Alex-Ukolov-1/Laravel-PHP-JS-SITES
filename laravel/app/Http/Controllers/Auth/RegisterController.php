<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

  protected $redirectTo = '/';

  public function __construct() {
    $this->middleware('guest');
  }

  protected function validator(array $data) {
    return Validator::make($data, [
      'name' => 'required|max:255',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|min:6|confirmed',
      'captcha' => 'captcha',
    ], [
      'name.required' => 'Введите имя пользователя',
      'name.max' => 'Имя пользователя должно быть не длиннее 255 символов',
      'email.required' => 'Введите адрес электронной почты',
      'email.email' => 'Введите корректный адрес электронной почты',
      'email.max' => 'Адрес электронной почты не должен превышать в длину 255 символов',
      'email.unique' => 'Пользователь с таким адресом электронной почты уже ' .
      'зарегистрирован в списке',
      'password.required' => 'Введите пароль',
      'password.min' => 'Пароль должен включать не менее 6 символов',
      'password.confirmed' => 'В полях "Пароль" и "Подтверждение пароля" следует ' .
      'указать одно и то же значение',
      'captcha.captcha' => 'Введены не те символы',
    ]);
  }

  protected function create(array $data) {
    return User::create([
      'name' => $data['name'],
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
    ]);
  }
}
