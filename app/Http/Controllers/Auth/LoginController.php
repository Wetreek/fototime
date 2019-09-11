<?php

namespace App\Http\Controllers\Auth; // Edit namespace -> add Auth
 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Add controller

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Logs errors

use App\Models\User;

use Illuminate\Validation\ValidationException;

use Carbon\Carbon;
use Socialite;

class LoginController extends Controller
{
    // Where to redirect after successful login
    protected $redirectTo = '/';
    protected $username = 'email';

    // Only guests can view login form
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }

    // Login logic

    // Login
    public function login(Request $request)
    {
        // Validate login
        $result = $this->validateLogin($request);
        
        $user = User::where('username', $request->email)->first();
        if(!$user) {
            throw ValidationException::withMessages([
                'oauth_login' => [trans('auth.dont_exist')]
            ]);
        }
        
        // Try to login
        if($this->attemptLogin($request)){
                    // TODO: Lock user after 3 attempts
            if($user->getUserErrorCount() >= 3){
                // lock user and send error message
                dd($user->getUserErrorCount());
                $user->lockUser();
                $this->logout($request);
                return $this->sendUserLockedResponse($request);
            }
            $this->resetErrorCount($user);
            $user->unlockUser();
            return $this->sendLoginResponse($request);

        } else {
            $this->incrementErrorCount($user);
            return $this->sendFailedLoginResponse($request);
        }
    }

    // Validate login
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string|max:255',
            'password' => 'required|string|max:255' 
        ]);
    }

    // Try to login, fields need to match form fields names 
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt([
            'username' => $request->email,
            'password' => $request->password
        ], $request->filled('remember'));
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendLoginResponse(Request $request)
    {
        // Generate new session
        $request->session()->regenerate();

        Log::info("User " . $request->email . " logged at " . Carbon::now()->toRfc7231String() . " from " . $request->ip());

        // Return success login message
        return $this->authenticated($request, $this->guard()->user()) ?: redirect()->intended($this->redirectTo);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        Log::notice("User " . $request->email . " has failed login at " . Carbon::now()->toRfc7231String() . " from " . $request->ip());
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')]
        ]);
    }

    // User locked response
    protected function sendUserLockedResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.locked')]
        ]);
    }

    // Failed login methods

    protected function incrementErrorCount(User $user)
    {
        $user->error_pwd_cnt += 1;
        $user->save();
    }

    // Reset failed login attempts

    protected function resetErrorCount(User $user)
    {
        $user->error_pwd_cnt = 0;
        $user->save();
    }

    // Helpers

    protected function authenticated(Request $request, $user)
    {
        //
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function loggedOut(Request $request)
    {

    }

    // Mask email as username
    protected function username()
    {
        return $this->username;
    }


    // SOCIALITE
    public function redirect($service) {
        return Socialite::driver($service)->redirect();
    }

    public function callback($service){
        $data = Socialite::with($service)->user();
        $user = User::whereUsername($data->email)->first();

        Log::info("OAuth login attempt with email: " . $data->email . " at " . Carbon::now()->toRfc7231String());

        if($user && auth()->login($user)){

            return redirect()->intended($redirectTo);
        } else {
            throw ValidationException::withMessages([
                'oauth_login' => [trans('auth.dont_exist')]
            ]);

        }
    }

}
