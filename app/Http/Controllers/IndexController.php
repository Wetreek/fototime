<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Competition;
use App\Models\TextTranslate;
use App\Models\Category;
use App\Models\CompetitionProposition;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::all();
        $competitions = Competition::all();
        //$competition = $competition->text_translates->where('lang_id', $lang)->first();
        //$competition = Competition::where('id', $id)->first();
        //$proposition = CompetitionProposition::where('competition_id', $id)->where('lang_id', $lang)->get();
        //$category = Category::where('competition_id', $id)->get();
        $lang = $this->getLangId();
        //return view('welcome', compact('competitions','competition', 'lang', 'category', 'proposition'));
        return view('welcome', compact('competitions', 'lang'));
    }
    public function gallery()
    {
        return view('photoGallery');
    }
    public function mygallery()
    {
        return view('myPhotoGallery');
    }
    public function archiveCompetitions()
    {
        $competitions = Competition::all();
        $lang = $this->getLangId();
        return view('archiveCompetitions',compact('competitions', 'lang')); 
    }

    public function show($id)
    {
        $competition = Competition::where('id', $id)->first();     
        $lang = $this->getLangId();
        $competition = $competition->text_translates->where('lang_id', $lang)->first();
        $category = Category::where('competition_id', $id)->get();
        $proposition = CompetitionProposition::where('competition_id', $id)->where('lang_id', $lang)->get();
        //dd($competition);
        return view('competitions.competition', compact('competition', 'lang', 'category', 'proposition'));
    }
    public function showOSutazi($id)
    {
        $competition = Competition::where('id', $id)->first();
        $category = Category::where('competition_id', $id)->get();
        $lang = $this->getLangId();
        $competition = $competition->text_translates->where('lang_id', $lang)->first();
        $proposition = CompetitionProposition::where('competition_id', $id)->where('lang_id', $lang)->get();
        //$competition = $competition->text_translates->where('lang_id', $lang)->first();
        
        return view('competitions.competitionOSutazi', compact('competition', 'lang', 'category', 'proposition'));
        //$lang = $this->getLangId();
        //$competition = Competition::where('id', $id)->first();
        //$proposition = CompetitionProposition::where('competition_id', $id)->where('lang_id', $lang)->get();
        
        //$competition = $competition->text_translates->where('lang_id', $lang)->first();
        //return view('competitions.competitionProposition', compact('competition', 'lang', 'proposition'));
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
