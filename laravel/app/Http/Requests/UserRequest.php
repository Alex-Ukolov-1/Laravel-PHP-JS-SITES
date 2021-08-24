<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'name' => 'required|max:255',
      'email' => 'required|email|max:255',
    ];
  }

  public function messages() {
    return [
      'name.required' => 'Введите имя пользователя',
      'name.max' => 'Имя пользователя должно быть не длиннее 255 символов',
      'email.required' => 'Введите адрес электронной почты',
      'email.email' => 'Введите корректный адрес электронной почты',
      'email.max' => 'Адрес электронной почты не должен превышать в длину 255 символов',
    ];
  }
}
