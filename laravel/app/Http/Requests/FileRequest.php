<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'imagefile' => 'image|max:1024',
      'audiofile' => 'mimes:mp3|max:16384',
      'videofile' => 'mimes:mp4|max:16384',
      'otherfile' => 'file|max:1024',
    ];
  }
}
