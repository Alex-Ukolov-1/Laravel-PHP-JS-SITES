<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
   public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'author' => 'required|max:255',
      'email' => 'required|email|max:255',
      'content' => 'required',
      'hidden' => 'boolean',
    ];
  }

  public function messages() {
    return [
      'author.required' => 'Введите имя автора',
      'author.max' => 'Имя автора должно быть не длиннее 255 символов',
      'email.required' => 'Введите адрес электронной почты автора',
      'email.max' => 'Адрес электронной почты автора должен быть не ' .
      'длиннее 255 символов',
      'email.email' => 'Введите корректный адрес электронной почты',
      'content.required' => 'Введите содержание комментария',
    ];
  }
}
