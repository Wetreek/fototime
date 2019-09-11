<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Closure;
use Session;
use Config;

class SiteController extends Controller
{
public function lang($lang)
{
    if (file_exists(resource_path("lang/$lang"))){
        Session::put('locale', $lang);
        return redirect()->back();
    }
    dd('error setting locale!');
}
}
