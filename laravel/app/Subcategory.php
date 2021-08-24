<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model {
  protected $fillable = ["name", "slug", "category", "order"];

  public function articles() {
    return $this->hasMany("App\Article", "subcategory", "id");
  }

  public function cat() {
    return $this->belongsTo("App\Category", "category", "id");
  }

  public function getRouteKeyName() {
    return "slug";
  }
}
