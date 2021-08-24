<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Category;

class CategoryComposer {
  public function compose(View $view) {
    $view->with("ccats", Category::select("name", "slug")
    ->orderBy("order", "desc")->orderBy("name")->get());
  }
}
