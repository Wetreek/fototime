<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Request $request)
    {
        $id=$request->id;
        
        //$users=User::all();
        $user = User::where('id', $id)->first();
        //dd(compact(['users']))
        $formAction = 'edit';
            return view('auth.edit',  compact(['user', 'formAction']));

       /* $id = auth()->user()->id;
        
        //$user = User::where('id', $id)->first();
        $user = auth()->user();
        //return view('auth.edit', compact(['user']));
        return view('admin.editUser', compact(['user'])); */
    }
    public function profile()
    {
        $formAction = 'profile';
        $user = auth()->user();
        return view('auth.edit', compact(['user', 'formAction']));
        
    }

    /*
    public function editAdmin()
    {
        // $users = User::all();
        return view('admin.editAdmin');
    }
    */

    // public function editUser(Request $request)
    // {
    //     $id=$request->id;
    //     //$users=User::all();
    //     $user = User::where('id', $id)->first();
    //     //dd(compact(['users']));
    //     return view('admin.editUser',  compact(['user']));
    // }

    public function update(Request $request)
    {
        request()->validate([
            'id' => 'required|numeric',
            'password' => '',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'title_academic' => '',
            'title_photo' => '',
            'phone' => '',
            'street' => '',
            'postal_code' => 'required|max:255',
            'city' => 'required|string|max:255',
            'country_id' => 'numeric'
        ]);

        $data = array(
            'fname' => $request->fname,
            'lname' => $request->lname,
            'title_academic' => $request->title_academic,
            'title_photo' => $request->title_photo,
            'phone' => $request->phone,
            'street' => $request->street,
            'postal_code' =>$request->postal_code,
            'city' => $request->city,
            'country_id' => $request->country_id
        );
        
        if(isset($request->password)){
            $data += array('userpwd'=> Hash::make($request->password));
        }
        $id=$request->id;
        //$data=User::where('id', $id)->first();
        $user=User::find($id);
        
        $user->update($data);
        //auth()->user()->update($data);}
        //return redirect('/edit');
        if (\Request::is('profile')) {
            return redirect()->action(
                'UsersController@profile'
            ); 
        }
        else 
        {
            return redirect('edit/'.$id);
        }

    }

   
}
