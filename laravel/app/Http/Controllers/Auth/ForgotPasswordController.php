<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
     use SendsPasswordResetEmails;

  public function __construct() {
    $this->middleware('guest');
  }

  public function sendResetLinkEmail(Request $request) {
    $this->validate($request, ['email' => 'required|email'], [
      'email.required' => 'Введите адрес электронной почты',
      'email.email' => 'Введите корректный адрес электронной почты',
    ]);

    $response = $this->broker()->sendResetLink(
      $request->only('email')
    );

    return $response == Password::RESET_LINK_SENT
      ? $this->sendResetLinkResponse($response)
      : $this->sendResetLinkFailedResponse($request, $response);
  }

  protected function sendResetLinkResponse($response) {
    return back()->with('status', 'Письмо со ссылкой на страницу сброса пароля ' .
    'успешно отправлено');
  }

  protected function sendResetLinkFailedResponse(Request $request, $response) {
    return back()->withErrors(
      ['email' => 'Указанный адрес электронной почты в списке отсутствует']
    );
  }
}