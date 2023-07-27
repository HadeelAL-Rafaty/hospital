<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class LanguagesController extends Controller {
    public function switchLang($lang)
    {
        session(['locale' => $lang]);
        return redirect()->back();
    } }
