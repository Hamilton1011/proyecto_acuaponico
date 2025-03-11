<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Validar el correo
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ]);

        // Enviar el correo con el enlace de restablecimiento
        $response = Password::sendResetLink(
            $request->only('email')
        );

        return $response == Password::RESET_LINK_SENT
                    ? back()->with('status', 'Se ha enviado un enlace de restablecimiento a tu correo.')
                    : back()->withErrors(['email' => 'No podemos encontrar un usuario con ese correo.']);
                }
                
}