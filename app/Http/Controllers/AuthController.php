<?php

namespace App\Http\Controllers;

use App\Interfaces\ITokenService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $token;

    public function __construct(ITokenService $token)
    {
        $this->token = $token;
    }

    public function create(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $token = $this->token->Authorize($credentials['email'], $credentials['password']);

        if (!$token) {
            return response('invalid_credentials', 400);
        }

        return response()->json(['token' => $token]);
    }
}