<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins; // Añadir esta línea

class LoginController extends Controller
{
    use AuthenticatesUsers, ThrottlesLogins;

    /**
     * Número máximo de intentos de inicio de sesión.
     *
     * @var int
     */
    protected $maxAttempts = 3; // Número máximo de intentos

    /**
     * Tiempo de espera (en minutos) después de exceder los intentos.
     *
     * @var int
     */
    protected $decayMinutes = 1; // Tiempo de espera de 30 segundos

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirige a los usuarios después del login según su rol.
     *
     * @return string
     * 
     */
    protected function redirectTo()
    {
        $role = auth()->user()->role; // Obtiene el rol del usuario autenticado

        switch ($role){
            case 'admin':
                 return route('admin.dashboard');   // Redirige a la página de admin
            case 'pasante':
                 return route('pasante.dashboard');   // Redirige a la página de pasante
            case 'aprendiz':
                 return route('aprendiz.dashboard'); // Redirige a la página de aprendiz
            default:
                 return route('home'); // Redirige a la página inicial si no tiene rol específico
        }
    }
}
