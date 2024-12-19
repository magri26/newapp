<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();

        // Si quieres personalizar la redirección
        return redirect('/dashboard')->with('status', '¡Sesión cerrada correctamente!');
    }
}
