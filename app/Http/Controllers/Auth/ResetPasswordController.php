<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function reset(Request $request)
    {
        
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        
        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->password = bcrypt($request->password);
                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $response == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', 'Contraseña restablecida con éxito.')
                    : back()->withErrors(['email' => [trans($response)]]);
    }
    
    protected $redirectTo = RouteServiceProvider::HOME;
}
class ResetPasswordNotification extends Notification
{
    protected $token;

    
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Restablecimiento de contraseña')
                    ->line('Recibiste este correo porque recibimos una solicitud de restablecimiento de contraseña para tu cuenta.')
                    ->action('Restablecer contraseña', url('password/reset', $this->token))  
                    ->line('Si no realizaste esta solicitud, ignora este correo.')
                    ->salutation('Saludos, ' . config('app.name'));
    }
}

