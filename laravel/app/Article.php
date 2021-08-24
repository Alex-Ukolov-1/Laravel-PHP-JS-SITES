<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {
  protected $fillable = ["title", "slug", "description", "content",
  "subcategory", "author"];

  public function comments() {
    return $this->hasMany("App\Comment", "article", "id");
  }

  public function subcat() {
    return $this->belongsTo("App\Subcategory", "subcategory", "id");
  }

  public function written_by() {
    return $this->belongsTo("App\User", "author", "id");
  }

  public function getRouteKeyName() {
    return "slug";
  }

  public function getFormattedContentAttribute() {
    $text = htmlentities($this->attributes["content"]);
    $text = preg_replace("/\n(.*?)\r/si", "<p>\\1</p>", "\n". $text . "\r");
    $text = preg_replace("/\[b\](.*?)\[\/b\]/si", "<strong>\\1</strong>",
    $text);
    $text = preg_replace("/\[i\](.*?)\[\/i\]/si", "<em>\\1</em>", $text);
    $text = preg_replace("/<p>\[center\](.*?)\[\/center\]<\/p>/si",
    "<p class='center'>\\1</p>", $text);
    $text = preg_replace("/<p>\[right\](.*?)\[\/right\]<\/p>/si",
    "<p class='right'>\\1</p>", $text);
    $text = preg_replace("/<p>\[h1\](.*?)\[\/h1\]<\/p>/si",
    "<h2>\\1</h2>", $text);
    $text = preg_replace("/<p>\[h2\](.*?)\[\/h2\]<\/p>/si",
    "<h3>\\1</h3>", $text);
    $text = preg_replace("/<p>\[h3\](.*?)\[\/h3\]<\/p>/si",
    "<h4>\\1</h4>", $text);
    $text = preg_replace("/<p>\[h4\](.*?)\[\/h4\]<\/p>/si",
    "<h5>\\1</h5>", $text);
    $text = preg_replace("/<p>\[h5\](.*?)\[\/h5\]<\/p>/si",
    "<h6>\\1</h6>", $text);
    $text = preg_replace("/<p>\[img\](.*?)\[\/img\]<\/p>/si",
    "<figure><img src='\\1'></figure>", $text);
    $text = preg_replace("/\[img\](.*?)\[\/img\]/si", "<img src='\\1'>",
    $text);
    $text = preg_replace("/<p>\[sign\](.*?)\[\/sign\]<\/p>/si",
    "<div class='sign'>\\1</div>", $text);
    $text = preg_replace("/\[url=(.*?)\](.*?)\[\/url\]/si",
    "<a href='\\1'>\\2</a>", $text);
    $text = preg_replace("/<p>\[audio\](.*?)\[\/audio\]<\/p>/si",
    "<figure><audio controls preload='metadata' src='\\1'></audio></figure>", $text);
    $text = preg_replace("/<p>\[video\](.*?)\[\/video\]<\/p>/si",
    "<figure><video controls preload='metadata' src='\\1'></video></figure>", $text);
    $text = preg_replace("/<p>\[code\](.*?)\[\/code\]<\/p>/si",
    "<pre><p>\\1</p></pre>", $text);
    $text = preg_replace("/<p>\[spoiler=(.*?)\](.*?)\[\/spoiler\]<\/p>/si",
    "<aside><a href='#'><span></span>\\1</a><div><p>\\2</p></div></aside>",
    $text);
    $text = preg_replace("/<p>\[lightbox=(.*?)\](.*?)\[\/lightbox\]<\/p>/si",
    "<figure class='lightbox'><a href='#'>". 
    "<span>Щелкните, чтобы увеличить</span><br>" .
    "<img src='\\1'><img class='full-image' src='\\2'></a></figure>", $text);
    $text = str_replace("<p></p>", "", $text);
    return $text;
  }
}