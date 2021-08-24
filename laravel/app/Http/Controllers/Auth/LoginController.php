<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
use AuthenticatesUsers;

  protected $redirectTo = '/';

  public function __construct() {
    $this->middleware('guest', ['except' => 'logout']);
  }

  protected function validateLogin(Request $request) {
    $this->validate($request, [
      $this->username() => 'required', 'password' => 'required',
    ], [
      $this->username() . '.required' => 'Введите адрес электронной почты',
      'password.required' => 'Введите пароль',
    ]);
  }

  protected function sendFailedLoginResponse(Request $request) {
    return redirect()->back()
    ->withInput($request->only($this->username(), 'remember'))
    ->withErrors([
      $this->username() => 'Пользователь с таким адресом электронной почты ' .
      'отсутствует в списке',
    ]);
  }
}
