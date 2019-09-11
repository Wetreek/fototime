<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Competition;
use App\Models\TextTranslate;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::all();
        $competitions = Competition::all();

        $lang = $this->getLangId();
        return view('welcome', compact(['competitions', 'lang']));
    }
    public function gallery()
    {
        return view('photoGallery');
    }
    public function mygallery()
    {
        return view('myPhotoGallery');
    }

    public function show($id)
    {
        //$landID = null;
        //app()->getLocale() == "sk" ? $langID = 1 : $langID = 2;
        $competition = Competition::where('id', $id)->first();
        //$competition = TextTranslate::where('lang_id', $langID)->where('competition_id', $id)->first();
        $lang = $this->getLangId();
        return view('competitions.competition', compact(['competition', 'lang']));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact(['users']));
    }
    protected function getLangId()
    {
        switch(app()->getLocale())
        {
            case 'sk':
                return 1;
                break;
            case 'en':
                return 2;
                break;
            default:
                return -1;
        }
    }
}
