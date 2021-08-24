<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Http\Requests\FileRequest;

class FileController extends Controller
{
    public function __construct() {
    parent::__construct();
    $this->middleware("auth")->except("get");
  }
  
  public function index() {
    $type = (request()->has("type")) ? request()->input("type") : 0;
    $count = request()->input("count");
    $files = File::select("id", "type", "description")
    ->where("user", auth()->id())->where("type", $type)
    ->latest()->simplePaginate($count);
    $files->appends(["type" => $type, "count" => $count]);
    return $files;
  }
  
  public function create(FileRequest $request) {
    $type = $request->type;
    switch ($type) {
      case 0:
        $par = "imagefile";
        break;
      case 1:
        $par = "audiofile";
        break;
      case 2:
        $par = "videofile";
        break;
      case 3:
        $par = "otherfile";
        break;
    }
    File::saveFile($request->file($par), $type, $request->description);
    return "1";
  }
  
  public function get(File $file) {
    $path = storage_path("/app/" . $file->id . "." . $file->extension);
    if ($file->type == 3) {
      return response()->download($path, $file->description . "." .
      $file->extension);
    } else {
      return response()->file($path);
    }
  }
  
  public function destroy(File $file) {
    $this->authorize("delete", $file);
    $file->deleteFile();
    return redirect()->action("FileController@index",
    ["type" => request()->input("type"), "count" => request()->input("count"),
    "page" => request()->input("page")]);
  }
}
