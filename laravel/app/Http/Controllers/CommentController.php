<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
   private function getParams() {
    $params = ["page" => request()->input("page")];
    if (request()->has("search")) {
      $params["search"] = request()->input("search");
    }
    if (request()->has("hdn")) {
      $params["hdn"] = 1;
    }
    return $params;
  }

  public function __construct() {
    parent::__construct();
    $this->middleware("auth")->except("create");
  }
  
  public function create(CommentRequest $request) {
    $this->validate($request, ["captcha" => "captcha"],
    ["captcha.captcha" => "Введены не те символы"]);
    $comment = Comment::create($request->all());
    return redirect(action("ArticleController@view", [
    "category" => $comment->art->subcat->cat->slug,
    "subcategory" => $comment->art->subcat->slug,
    "article" => $comment->art->slug, "search" => request()->input("search"),
    "page" => request()->input("page")]) . "#last_comment");
  }
  
  public function index() {
    $comments = Comment::latest();
    if (request()->has("hdn")) {
      $comments = $comments->where("hidden", true);
    }
    if (request()->has("search")) {
      $s = request()->input("search");
      $comments = $comments->where([["author", "like", "%" . $s . "%"],
      ["content", "like", "%" . $s . "%", "or"]]);
    }
    $comments = $comments->paginate(1);
    if (request()->has("search")) {
      $comments->appends("search", $s);
    }
    if (request()->has("hdn")) {
      $comments->appends("hdn", 1);
    }
    return view("comments.index", ["comments" => $comments]);
  }

  public function input(Comment $comment) {
    $this->authorize("manipulate", $comment);
    return view("comments.input", ["comment" => $comment,
    "params" => $this->getParams()]);
  }

  public function save(CommentRequest $request) {
    $comment = Comment::findOrFail($request->id);
    $this->authorize("manipulate", $comment);
    $comment->fill($request->all());
    $comment->hidden = ($request->has("hidden")) ? true : false;
    $comment->save();
    return redirect()->action("CommentController@index",
    $this->getParams())->with("status", "Комментарий исправлен");
  }

  public function destroy(Comment $comment) {
    $this->authorize("manipulate", $comment);
    $comment->delete();
    return redirect()->action("CommentController@index",
    $this->getParams())->with("status", "Комментарий удалён");
  }
}
