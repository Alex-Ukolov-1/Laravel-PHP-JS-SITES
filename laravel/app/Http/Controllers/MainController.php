<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class MainController extends Controller
{
    public function index() {
    if ($this->isMobile) {
      $cats = Category::orderBy("order", "desc")->orderBy("name")->get();
    } else {
      $cats = null;
    }
    return view("main", ["cats" => $cats]);
  }

  public function policy() {
    return view("policy");
  }

  public function about() {
    return view("about");
  }

  public function bbcodes() {
    return view("bbcodes");
  }
}
