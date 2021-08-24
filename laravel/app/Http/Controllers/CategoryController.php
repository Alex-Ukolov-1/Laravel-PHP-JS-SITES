<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;
use App\Subcategory;
use App\Article;

class CategoryController extends Controller
{
    public function __construct() {
    parent::__construct();
    $this->middleware("can:manipulate,App\Category")->except("view");
  }
  
  public function index() {
    $cats = Category::orderBy("order", "desc")->orderBy("name")->get();
    return view("categories.index", ["cats" => $cats]);
  }

  public function input(Category $category) {
    if (!($category->id)) {
      $category->order = 0;
    }
    return view("categories.input", ["cat" => $category]);
  }

  public function save(CategoryRequest $request) {
    if ($request->has("id")) {
      $cat = Category::findOrFail($request->id);
      $cat->fill($request->all())->save();
      $s = " исправлена";
    } else {
      $cat = Category::create($request->all());
      $s = " создана";
    }
    return redirect()->action("CategoryController@index")
    ->with("status", "Категория " . $cat->name . $s);
  }

  public function destroy(Category $category) {
    $name = $category->name;
    $category->delete();
    return redirect()->action("CategoryController@index")
    ->with("status", "Категория " . $name . " удалена");
  }
  
  public function view(Category $category) {
    $subcats = Subcategory::select("name", "slug")
    ->where("category", $category->id)
    ->orderBy("order", "desc")->orderBy("name")->get();
    if ($this->isMobile) {
      $articles = null;
    } else {
      $articles = Article::select("articles.*", "users.name as authorname",
      "subcategories.name as subcat", "categories.name as cat",
      "subcategories.slug as subcatslug", "categories.slug as catslug")
      ->join("users", "articles.author", "users.id")
      ->join("subcategories", "articles.subcategory", "subcategories.id")
      ->join("categories", "subcategories.category", "categories.id")
      ->where("subcategories.category", $category->id)
      ->latest("articles.created_at")->orderBy("articles.title")->limit(5)->get();
    }
    return view("categories.view", ["subcats" => $subcats,
    "currentCat" => $category, "articles" => $articles]);
  }
}
