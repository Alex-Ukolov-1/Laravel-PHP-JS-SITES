<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
use App\Http\Requests\SubcategoryRequest;

class SubcategoryController extends Controller
{
     public function __construct() {
    parent::__construct();
    $this->middleware("can:manipulate,App\Subcategory");
  }
  
  public function index() {
    $subcats = Subcategory::select("subcategories.*", "categories.name as catname")
    ->join("categories", "subcategories.category", "categories.id")
    ->orderBy("categories.order", "desc")->orderBy("categories.name")
    ->orderBy("order", "desc")->orderBy("name")->get();
    return view("subcategories.index", ["subcats" => $subcats]);
  }

  public function input(Subcategory $subcategory) {
    if (!($subcategory->id)) {
      $subcategory->order = 0;
    }
    $cats = Category::orderBy("order", "desc")->orderBy("name")
    ->get(["name", "id"]);
    return view("subcategories.input", ["subcat" => $subcategory, "cats" => $cats]);
  }

  public function save(SubcategoryRequest $request) {
    if ($request->has("id")) {
      $subcat = Subcategory::findOrFail($request->id);
      $subcat->fill($request->all())->save();
      $s = " исправлена";
    } else {
      $subcat = Subcategory::create($request->all());
      $s = " создана";
    }
    return redirect()->action("SubcategoryController@index")
    ->with("status", "Подкатегория " . $subcat->name . $s);
  }

  public function destroy(Subcategory $subcategory) {
    $name = $subcategory->name;
    $subcategory->delete();
    return redirect()->action("SubcategoryController@index")
    ->with("status", "Подкатегория " . $name . " удалена");
  }
}
