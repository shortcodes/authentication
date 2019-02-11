<?php

namespace Shortcodes\Authentication\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Shortcodes\Authentication\Mail\RegisterUser;

class RegisterController extends Controller
{
    const REGISTER_USER_PURPOSE = 'register-user';
    const REGISTER_USER_TOKEN_CACHE_KEY = 'register-user-token';
    const REGISTER_USER_TOKEN_CACHE_KEY_MINUTES = 60;

    public function register(Request $request)
    {
        $data = $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required',
        ]);

        $data['password'] = app('hash')->make($data['password']);

        try {
            $user = User::create($data);
            Mail::to($user->email)->send(new RegisterUser($user));

            return response()->json($user, 201);
        } catch (\Exception $exception) {
            Log::critical($exception);
            return response()->json(['message' => trans('messages.server_error')]);
        }
    }

    public function confirmRegistration(Request $request, $token)
    {
        $decoded = null;
        try {
            $decoded = JWT::decode($token, env("JWT_SECRET"), [env("JWT_ALGO")]);
        } catch (\Exception $e) {
            return response()->json(['message' => trans('messages.invalid_token')], 422);
        }


        if (!$decoded ||
            $decoded->purpose !== self::REGISTER_USER_PURPOSE ||
            Cache::has(self::REGISTER_USER_TOKEN_CACHE_KEY . ':' . $token)
        ) {
            return response()->json(['message' => trans('messages.invalid_token')], 422);
        }

        $user = User::whereEmail($decoded->email)->first();
        $user->active = 1;
        $user->save();

        Cache::put(self::REGISTER_USER_TOKEN_CACHE_KEY . ':' . $token, true, self::REGISTER_USER_TOKEN_CACHE_KEY_MINUTES);

        return response()->json([], 204);

    }
}