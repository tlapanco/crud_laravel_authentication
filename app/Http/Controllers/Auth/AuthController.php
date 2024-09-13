<?php

namespace App\Http\Controllers\Auth;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\AuthRootRequest;

class AuthController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function authenticate(AuthRootRequest $request){

        $credentials = $request->only('email', 'password');
        $area_id = Area::where('nombre', 'LIKE', "%BIBLIOTECA%")->first();

        $credentials['ida'] = $area_id->ida;

        if (Auth::guard('root')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }else{
            return redirect()->route('login')->with('message', 'Credenciales de Acceso Incorrectas');
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::logout();

            $request->session()->invalidate();

            return redirect()->route('index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
