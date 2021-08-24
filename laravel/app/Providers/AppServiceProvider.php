<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    public function boot() {
    View::composer("layouts.pc", "App\Http\ViewComposers\CategoryComposer");
  }

  public function register() {
  }
}
