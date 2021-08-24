<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
  protected $fillable = ["author", "email", "content", "article", "hidden"];

  public function art() {
    return $this->belongsTo("App\Article", "article", "id");
  }

  public function getFormattedContentAttribute() {
    $text = htmlentities($this->attributes["content"]);
    $text = preg_replace("/\n(.*?)\r/si", "<p>\\1</p>", "\n". $text . "\r");
    return $text;
  }
}