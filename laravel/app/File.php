<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model {
  protected $fillable = ["user", "type", "extension", "description"];

  public function uploaded_by() {
    return $this->belongsTo("App\User", "user", "id");
  }

  static public function saveFile($file, $type, $desc) {
    $f = File::create([
      "user" => auth()->id(),
      "type" => $type,
      "extension" => $file->getClientOriginalExtension(),
      "description" => $desc,
    ]);
    $file->storeAs("", $f->id . "." . $f->extension);
  }
  
  public function deleteFile() {
    Storage::delete($this->id . "." . $this->extension);
    $this->delete();
  }
}
