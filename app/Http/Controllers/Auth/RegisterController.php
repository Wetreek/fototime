<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Events\Registered;

use App\Http\Controllers\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    // Where to redirect after successful register
    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user) ?: redirect($this->redirectTo);
    }

    // Register logic // 

    protected function create(array $data)
    { 
        return User::create([
            'username' => $data['email'],
            'userpwd' => Hash::make($data['password']),
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'title_academic' => $data['title_academic'],
            'title_photo' => $data['title_photo'],
            'phone' => $data['phone'],
            'street' => $data['street'],
            'postal_code' => $data['postal_code'],
            'city' => $data['city'],
            'country_id' => $data['country_id'],

        ]);
    }

    protected function registered(Request $request, $user)
    {

    }

    // Validator //

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|max:255',
            'password' => 'required|string|max:255|confirmed',
        ]);
    }

    // Helepers //

    protected function guard()
    {
        return Auth::guard();
    }
}
