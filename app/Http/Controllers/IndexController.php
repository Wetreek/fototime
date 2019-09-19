<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Competition;
use App\Models\Photo;

class IndexController extends Controller
{
    public function index()
    {
        $users = User::all();
        $competitions = Competition::all();
        $photos = Photo::paginate(3);

        $lang = $this->getLangId();
        return view('index', compact(['competitions', 'lang', 'photos']));
    }

    // return users as json
    public function users(Request $request)
    {
        $users_per_page = $request->input('per_page');
        $users = User::paginate($users_per_page);

        return response()->json($users);
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
