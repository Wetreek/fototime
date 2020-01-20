<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Competition;
use App\Models\TextTranslate;
use App\Models\Category;
use App\Models\CompetitionProposition;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {
        $competitions = \App\Models\Competition::where('status', 0)->get();
        $lang = $this->getLangId();
        
        $propositions = [];
        $categoryCompetition = [];
        foreach ($competitions as $competition) {
            $compId = $competition->id;
            $propositions[$compId] = CompetitionProposition::where('competition_id', $compId)->where('lang_id', $lang)->get();
            $categoryCompetition[$compId] = DB::select (DB::raw('SELECT distinct c.id, tt.name from text_translates as tt, categories as c 
        where c.competition_id=:id 
        and tt.category_id=c.id 
        and tt.lang_id=:langId'), array('id'=>$compId, 'langId'=>$lang));
        }
        //$category = Category::where('competition_id', $id)->get();
        
       // return view('welcome', compact('competitionsInfo', 'lang', 'category', 'proposition'));
        return view('welcome', compact('competitions', 'propositions', 'categoryCompetition', 'lang'));
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
    {   $competitions = \App\Models\Competition::where('status', 2)->get();
        $lang = $this->getLangId();
        
        $propositions = [];
        $categoryCompetition = [];
        foreach ($competitions as $competition) {
            $compId = $competition->id;
            $propositions[$compId] = CompetitionProposition::where('competition_id', $compId)->where('lang_id', $lang)->get();
            $categoryCompetition[$compId] = DB::select (DB::raw('SELECT distinct c.id, tt.name from text_translates as tt, categories as c 
        where c.competition_id=:id 
        and tt.category_id=c.id 
        and tt.lang_id=:langId'), array('id'=>$compId, 'langId'=>$lang));
        }
        //$category = Category::where('competition_id', $id)->get();
        
       // return view('welcome', compact('competitionsInfo', 'lang', 'category', 'proposition'));
        return view('archiveCompetitions', compact('competitions', 'propositions', 'categoryCompetition', 'lang'));
    }

    public function show($id)
    {
        $competition = Competition::where('id', $id)->first();     
        $lang = $this->getLangId();
        $competition = $competition->text_translates->where('lang_id', $lang)->first();
        $category = Category::where('competition_id', $id)->get();
        $categoryCompetition = DB::select (DB::raw('SELECT distinct c.id, tt.name from text_translates as tt, categories as c 
        where c.competition_id=:id 
        and tt.category_id=c.id 
        and tt.lang_id=:langId'), array('id'=>$id, 'langId'=>$lang));
        $proposition = CompetitionProposition::where('competition_id', $id)->where('lang_id', $lang)->get();
        //dd($competition);
        return view('competitions.competition', compact('competition', 'lang', 'category', 'categoryCompetition', 'proposition'));
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
    public function loginCompetition($id)
   {
    $competition = Competition::where('id', $id)->first();
    $lang = $this->getLangId();
    $competition = $competition->text_translates->where('lang_id', $lang)->first();
    /*$ageSubcategories = DB::table('age_subcategories_categories')
        ->join('categories',function($join){
            $join->where('categories.competition_id', '=', 1)
                 ->where('categories.id', '=', 'age_subcategories.category_id');
        })
        ->join('text_translates',function($join){
            $join->where('text_translates.age_subcategory_id', '=', 'age_subcategories.id')
                 ->where('text_translates.lang_id', '=', 1);
        })
        ->join('age_subcategories', 'age_subcategories.id', '=', 'age_subcategories_categories.age_id')
        ->select('age_subcategories.id', 'text_translates.name')
        ->get();*/
        $ageSubcategories = DB::select (DB::raw('SELECT distinct age.id, tt.name FROM fototime.categories AS c,
        fototime.text_translates AS tt, 
        fototime.age_subcategories_categories AS ascat, fototime.age_subcategories age
        WHERE c.competition_id=:id 
        and tt.age_subcategory_id=age.id
                       and c.id=ascat.category_id
                       and age.id=ascat.age_id
                       and tt.lang_id=:langId'), array('id'=>$id, 'langId'=>$lang));

    return view('competitions.competition-loginCompetition', compact( 'lang','ageSubcategories', 'competition'));
   }
   public function uploadPhoto($id)
   {
    $competition = Competition::where('id', $id)->first();
    $lang = $this->getLangId();
    $competition = $competition->text_translates->where('lang_id', $lang)->first();
    $category = Category::where('competition_id', $id)->get();
            $categoryCompetition = DB::select (DB::raw('SELECT distinct c.id, tt.name from text_translates as tt, categories as c 
            where c.competition_id=:id 
            and tt.category_id=c.id 
            and tt.lang_id=:langId'), array('id'=>$id, 'langId'=>$lang));
            $proposition = CompetitionProposition::where('competition_id', $id)->where('lang_id', $lang)->get();

    return view('photos.uploadPhoto', compact( 'lang', 'competition', 'category', 'categoryCompetition'));
   }
    public function detailPhoto($id)
    {
        $photoInfo = Category::where('id', $id)->get()[0];
        return view('photos.detailPhoto', compact( 'id', 'photoInfo'));
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
