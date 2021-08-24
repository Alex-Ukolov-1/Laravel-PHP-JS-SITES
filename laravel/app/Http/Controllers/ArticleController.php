<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\Subcategory;
use App\Http\Requests\ArticleRequest;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    private function getRedirect($article) {
    $params = [];
    if (request()->has("search")) {
      $params["search"] = request()->input("search");
      $params["page"] = request()->input("page");
      $c = "ArticleController@search";
    } else {
      $params["category"] = $article->subcat->cat->slug;
      if (request()->has("page")) {
        $params["subcategory"] = $article->subcat->slug;
        $params["page"] = request()->input("page");
        $c = "ArticleController@index";
      } else {
          $c = "CategoryController@view";
      }
    }
    return action($c, $params);
  }
  
  public function __construct() {
    parent::__construct();
    $this->middleware("auth")->except(["index", "view", "search"]);
  }

  public function index(Category $category, Subcategory $subcategory) {
    $articles = Article::select("articles.*", "users.name as authorname")
    ->join("users", "articles.author", "users.id")
    ->where("articles.subcategory", $subcategory->id)
    ->latest("articles.created_at")->orderBy("articles.title")->paginate(1);
    if ($this->isMobile) {
      $subcats = null;
    } else {
      $subcats = Subcategory::select("name", "slug")
      ->where("category", $category->id)
      ->orderBy("order", "desc")->orderBy("name")->get();
    }
    return view("articles.index", ["articles" => $articles, "subcats" => $subcats,
    "currentSubcat" => $subcategory, "currentCat" => $category]);
  }

  public function input(Category $category, Subcategory $subcategory, Article $article) {
    if ($article->id) {
      $this->authorize("manipulate", $article);
    } else {
      $article->subcategory = $subcategory->id;
    }
    $subcats = Subcategory::select("subcategories.id", "categories.name as cat",
    "subcategories.name as subcat")
    ->join("categories", "subcategories.category", "categories.id")
    ->orderBy("categories.order", "desc")->orderBy("categories.name")
    ->orderBy("subcategories.order", "desc")->orderBy("subcategories.name")->get();
    $params = ["page" => request()->input("page")];
    if (request()->has("search")) {
      $params["search"] = request()->input("search");
      $c = "ArticleController@search";
    } else {
      $params["category"] = $category->slug;
      $params["subcategory"] = $subcategory->slug;
      $params["page"] = request()->input("page");
      $c = "ArticleController@index";
    }
    return view("articles.input", ["article" => $article, "subcats" => $subcats,
    "params" => $params, "c" => $c]);
  }

  public function save(ArticleRequest $request) {
    if ($request->has("id")) {
      $article = Article::findOrFail($request->id);
      $this->authorize("manipulate", $article);
      $article->fill($request->all())->save();
      $s = " исправлена";
    } else {
      $article = new Article($request->all());
      $article->author = auth()->id();
      if (!($article->description)) {
        $article->description = substr($article->content, 0, 254) . "…";
      }
      $article->save();
      $s = " создана";
    }
    return redirect($this->getRedirect($article))
    ->with("status", "Статья " . $article->title . $s);
  }

  public function destroy(Category $category, Subcategory $subcategory,
  Article $article) {
    $this->authorize("manipulate", $article);
    $name = $article->title;
    $article->delete();
    return redirect($this->getRedirect($article))
    ->with("status", "Статья " . $name . " удалена");
  }
  
  public function view(Category $category, Subcategory $subcategory, Article $article) {
    $comments = Comment::select("author", "email", "content", "created_at",
    "hidden")->where("article", $article->id)->oldest()->get();
    $comment = new Comment(["article" => $article->id]);
    if (auth()->check()) {
      $comment->author = Auth::user()->name;
      $comment->email = Auth::user()->email;
    }
    return view("articles.view", ["article" => $article,
    "h" => $this->getRedirect($article), "comments" => $comments,
    "comment" => $comment]);
  }
  
  public function search() {
    if (request()->has("search")) {
      $s = request()->input("search");
      $articles = Article::select("articles.*", "users.name as authorname",
      "subcategories.name as subcat", "categories.name as cat",
      "subcategories.slug as subcatslug", "categories.slug as catslug")
      ->join("users", "articles.author", "users.id")
      ->join("subcategories", "articles.subcategory", "subcategories.id")
      ->join("categories", "subcategories.category", "categories.id")
      ->where("articles.title", "like", "%" . $s . "%")
      ->orWhere("articles.content", "like", "%" . $s . "%")
      ->latest("articles.created_at")->orderBy("articles.title")->paginate(1);
      $articles->appends("search", $s);
    } else {
      $articles = null;
    }
    return view("articles.search", ["articles" => $articles]);
  }
}


