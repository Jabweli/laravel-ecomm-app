<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
  /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
   */

  use AuthenticatesUsers;

  /**
   * Where to redirect users after login.
   *
   * @var string
   */


  protected function authenticated(Request $request, $user)
  {
    if ($request->expectsJson()) {
      return response()->json(['message' => 'Login successful.']);
    }

    if (Auth::user() && Auth::user()->utype === 'ADM') {
      // Redirect admin to the admin dashboard
      return redirect()->intended(route('admin.dashboard'));
    } elseif (session()->has('url.intended') && Str::contains(session('url.intended'), 'checkout')) {
      // Redirect user to the checkout page if that was the intended URL
      return redirect()->intended(route('checkout'));
    }

    // Redirect regular user to the home page if the intended URL is not the checkout page
    // return redirect($this->redirectPath());
    return redirect('/');
  }


  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }
}
