<?php namespace App\Interfaces;

interface ITokenService {
    public function Authorize($username, $password);
    public function Authenticate();
}