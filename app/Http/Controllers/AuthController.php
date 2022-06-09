<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @group Auth Login endpoints
 */
class AuthController extends Controller
{

    /**
     * Handle a login request to the application.
     *
     * @bodyParam email email required The email of the user. Example: demo@demo.com
     * @bodyParam password password required The password of the user. Example: password
     *
     * @response status=422 scenario="Validation error" {
     *    "message": "The given data was invalid.",
     *    "errors": {
     *        "email": [
     *            "The email field is required."
     *        ]
     *    }
     * }
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function signIn(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function me(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'email' => $user->email,
            'name' => $user->name,
            'priority' => $user->priority
        ]);
    }


    public function SignOutController()
    {
        auth()->logout();
    }
}
