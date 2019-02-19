<?php

namespace Shortcodes\Authentication\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $request->merge([]);

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($token = Auth::attempt(array_merge($request->only($this->credentials()), $this->additionalConditions()), $request->get('remember'))) {
            return response()->json(
                [
                    'jwt_token' => $token
                ]
            );
        }

        return response()->json([
            'errors' => [
                'email' => [
                    0 => trans('auth.failed')
                ]
            ]
        ], 422);
    }

    protected function credentials()
    {
        return ['email', 'password'];
    }

    protected function additionalConditions()
    {
        return ['active' => 1];
    }
}
