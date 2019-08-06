<?php

namespace Ninja\Manager\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
  protected $redirectTo = '/admin/products';

  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function showLoginForm()
  {
    return view('manager::auth.login');
  }

  public function logout(Request $request)
  {
    $this->guard()->logout();

    $request->session()->invalidate();

    return redirect('/login');
  }

  public function redirectPath()
  {
    if (method_exists($this, 'redirectTo')) {
      return $this->redirectTo();
    }

    return property_exists($this, 'redirectTo') ? $this->redirectTo : '/admin/products';
  }

  protected function loggedOut(Request $request)
  {
    //
  }
}
