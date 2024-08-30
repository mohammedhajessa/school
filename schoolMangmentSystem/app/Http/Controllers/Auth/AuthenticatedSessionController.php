<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    // public function create($type): View
    // {
    //     return view('auth.login',compact('type'));
    // }

    // /**
    //  * Handle an incoming authentication request.
    //  */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect()->intended(RouteServiceProvider::HOME);
    // }

    // /**
    //  * Destroy an authenticated session.
    //  */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     Auth::guard('web')->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }
    // public function chekGuard($request){

    //     if($request->type == 'student'){
    //         $guardName= 'student';
    //     }
    //     elseif ($request->type == 'parent'){
    //         $guardName= 'parent';
    //     }
    //     elseif ($request->type == 'teacher'){
    //         $guardName= 'teacher';
    //     }
    //     else{
    //         $guardName= 'web';
    //     }
    //     return $guardName;
    // }

    // public function redirect($request){
    //     if($request->type == 'student'){
    //         return redirect()->intended(RouteServiceProvider::STUDENT);
    //     }
    //     elseif ($request->type == 'parent'){
    //         return redirect()->intended(RouteServiceProvider::PARENT);
    //     }
    //     elseif ($request->type == 'teacher'){
    //         return redirect()->intended(RouteServiceProvider::TEACHER);
    //     }
    //     else{
    //         return redirect()->intended(RouteServiceProvider::HOME);
    //     }
    // }
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }


    // public function loginForm($type){
    //     return view('auth.login',compact('type'));
    // }

    // public function login(Request $request){
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //         'type' => 'required|in:student,parent,teacher,web'
    //     ]);

    //     // محاولة تسجيل الدخول باستخدام الحارس المناسب
    //     if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
    //         return $this->redirect($request);
    //     }

    //     // في حالة فشل تسجيل الدخول
    //     return redirect()->back()->withErrors([
    //         'email' => 'البيانات المدخلة غير صحيحة.',
    //     ])->withInput($request->only('email', 'type'));

    // }

    // public function logout(Request $request,$type)
    // {
    //     Auth::guard($type)->logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }
    // public function showSelectionForm()
    // {
    //     return view('auth.selection');
    // }

    // public function showLoginForm($type)
    // {
    //     return view('auth.login', compact('type'));
    // }

    // protected function redirectTo($type)
    // {
    //     switch ($type) {
    //         case 'student':
    //             return RouteServiceProvider::STUDENT;
    //         break;
    //         case 'teacher':
    //             return RouteServiceProvider::TEACHER;
    //         break;
    //         case 'parent':
    //             return RouteServiceProvider::PARENT;
    //         break;
    //         default:
    //         return RouteServiceProvider::HOME;
    //     }
    // }

    // public function login(Request $request)
    // {
    //     $this->validate($request, [
    //         'email' => 'required|email',
    //         'password' => 'required|string',
    //     ]);

    //     $guard = $this->getGuard($request->type);

    //     if (Auth::guard($guard)->attempt($request->only('email', 'password'))) {
    //         return redirect()->intended($this->redirectTo($request->type));
    //     }

    //     return back()->withErrors([
    //         'email' => 'The provided credentials do not match our records.',
    //     ]);
    // }

    // protected function getGuard($type)
    // {
    //     return match ($type) {
    //         'student' => 'student',
    //         'teacher' => 'teacher',
    //         'parent' => 'parent',
    //         default => 'web',
    //     };
    // }
    // public function chekGuard($request){

    //     if($request->type == 'student'){
    //         $guardName= 'student';
    //     }
    //     elseif ($request->type == 'parent'){
    //         $guardName= 'parent';
    //     }
    //     elseif ($request->type == 'teacher'){
    //         $guardName= 'teacher';
    //     }
    //     else{
    //         $guardName= 'web';
    //     }
    //     return $guardName;
    // }

    // public function redirect($request){

    //     if($request->type == 'student'){
    //         return redirect()->intended(RouteServiceProvider::STUDENT);
    //     }
    //     elseif ($request->type == 'parent'){
    //         return redirect()->intended(RouteServiceProvider::PARENT);
    //     }
    //     elseif ($request->type == 'teacher'){
    //         return redirect()->intended(RouteServiceProvider::TEACHER);
    //     }
    //     else{
    //         return redirect()->intended(RouteServiceProvider::HOME);
    //     }
    // }
    // public function login(LoginRequest $request){
    //     if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
    //         return $this->redirect($request);
    //     }
    // }
    public function loginForm($type)
    {
        return view('auth.login', compact('type'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $guard = $this->chekGuard($request);
        if (Auth::guard($guard)->attempt($credentials)) {
            return $this->redirect($request);
        }

        return back()->withErrors(['email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.']);
    }

    public function chekGuard($request)
    {
        switch ($request->type) {
            case 'student':
                return 'student';
            case 'my__parent':
                return 'my__parent';
            case 'teacher':
                return 'teacher';
            default:
                return 'web';
        }
    }

    public function redirect($request)
    {
        switch ($request->type) {
            case 'student':
                return redirect()->intended(RouteServiceProvider::STUDENT);
            case 'my__parent':
                return redirect()->intended(RouteServiceProvider::PARENT);
            case 'teacher':
                return redirect()->intended(RouteServiceProvider::TEACHER);
            default:
                return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
