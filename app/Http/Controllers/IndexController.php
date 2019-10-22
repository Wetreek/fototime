<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Competition;
use App\Models\TextTranslate;
use App\Models\Category;

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
        $competition = Competition::where('id', $id)->first();     
        $lang = $this->getLangId();
        $competition = $competition->text_translates->where('lang_id', $lang)->first();
        //dd($competition);
        return view('competitions.competition', compact('competition', 'lang'));
    }
    public function showInfo($id)
    {
        $competition = Competition::where('id', $id)->first();
        $category = Category::where('competition_id', $id)->get();
        $lang = $this->getLangId();
        $competition = $competition->text_translates->where('lang_id', $lang)->first();
        //$category = $category->text_translates->where('lang_id', $lang);
        //dd($category);
        return view('competitions.competitionInfo', compact('competition', 'lang', 'category'));
        //return view('competitions.competitionInfo', compact('competition', 'lang'));
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
