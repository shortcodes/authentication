<?php

namespace Shortcodes\Authentication\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Shortcodes\Authentication\Mail\RemindPassword;

class PasswordController extends Controller
{
    const RESET_PASSWORD_PURPOSE = 'reset-password';
    const RESET_PASSWORD_TOKEN_CACHE_KEY = 'remind-password-token';
    const RESET_PASSWORD_CACHE_KEY_MINUTES = 60;

    public function remindPassword(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::whereEmail($request->get('email'))->firstOrFail();

        try {
            Mail::to($user->email)->send(new RemindPassword($user));
        } catch (\Exception $e) {
            Log::critical($e);
            return response()->json(['message' => trans('messages.server_error')]);
        }

        return response()->json([], 204);
    }



    public function resetPassword(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'password' => 'required|min:6',
        ]);

        try {
            $decoded = JWT::decode($request->get('token'), env("JWT_SECRET"), [env("JWT_ALGO")]);
        } catch (\Exception $e) {
            logger($e);
        }

        if (!$decoded ||
            $decoded->purpose !== self::RESET_PASSWORD_PURPOSE ||
            Cache::has(self::RESET_PASSWORD_TOKEN_CACHE_KEY . ':' . $request->token)
        ) {
            return response()->json(['message' => trans('messages.invalid_token')], 422);
        }

        User::whereEmail($decoded->email)->update([
            'password' => app('hash')->make($request->get('password'))
        ]);

        Cache::put(self::RESET_PASSWORD_TOKEN_CACHE_KEY . '' . $request->token, true, self::RESET_PASSWORD_CACHE_KEY_MINUTES);

        return response()->json([], 204);

    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:8'
        ]);

        if (!Hash::check($request->get('old_password'), Auth::user()->password)) {
            return response()->json([
                'errors' => [
                    'old_password' => [
                        0 => trans('messages.passwords_not_the_same')
                    ]
                ]
            ], 422);

        }

        Auth::user()->forceFill([
            'password' => app('hash')->make($request->get('new_password')),
        ])->save();

        return response()->json([], 204);
    }
}
