<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
   public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'name' => 'required|max:30',
      'slug' => 'required|max:30',
      'order' => 'required|integer|max:255',
    ];
  }

  public function messages() {
    return [
      'name.required' => 'Введите название категории',
      'name.max' => 'Название категории должно быть не длиннее 30 символов',
      'slug.required' => 'Введите слаг',
      'slug.max' => 'Слаг должен быть не длиннее 30 символов',
      'order.required' => 'Введите порядок',
      'order.integer' => 'Порядок должен быть целым числом',
      'order.max' => 'Порядок не должен превышать 255',
    ];
  }
}
