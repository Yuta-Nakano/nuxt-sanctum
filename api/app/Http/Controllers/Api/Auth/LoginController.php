<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        abort_unless(
            auth()->attempt($credentials, $request->has('remember')),
            response([
                'message' => ['Unauthorized.']
            ], 401)
        );

        /**
         * Generate API token for access from third parties.
         * TODO: Identify third-party devices if possible.
         */
        // $token = auth()
        //     ->user()
        //     ->createToken('api')
        //     ->plainTextToken;

        return response(['authenticated'], 200);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        return response(['logout']);
    }
}
