<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest{
   public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'title' => 'required|max:100',
      'slug' => 'required|max:100',
      'description' => 'max:255',
      'content' => 'required',
    ];
  }

  public function messages() {
    return [
      'title.required' => 'Введите заголовок статьи',
      'title.max' => 'Заголовок статьи должен быть не длиннее 100 символов',
      'slug.required' => 'Введите слаг',
      'slug.max' => 'Слаг должен быть не длиннее 100 символов',
      'description.max' => 'Анонс статьи должен быть не длиннее 255 символов',
      'content.required' => 'Введите содержание статьи',
    ];
  }
}
