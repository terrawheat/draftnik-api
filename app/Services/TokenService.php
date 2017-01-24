<?php namespace App\Services;

use App\Interfaces\ITokenService;
use JWTAuth;

class TokenService implements ITokenService {
    private $auth;

    public function __construct(JWTAuth $auth) {
        $this->auth = $auth;
    }

    public function Authorize($email, $password) {
        $token = $this->auth->attempt(['email' => $email, 'password' => $password]);

        if (!$token) {
            return false;
        }

        return $token;
    }

    public function Authenticate() {
        $user = $this->auth->parseToken()->authenticate();

        return $user;
    }
} 