<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');  // Redirect ke halaman dashboard jika sudah login
        }
    
        return view('auth.login');
    }

    public function login(Request $request)
{
   // Validasi data
$request->validate([
    'email' => 'required|email',
    'password' => 'required',
]);

// Cek kredensial login
if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
    return redirect()->route('dashboard');  // Pastikan ini sesuai dengan nama route 'dashboard'
}

return back()->withErrors([
    'email' => 'The provided credentials do not match our records.',
]);
}


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    
}
