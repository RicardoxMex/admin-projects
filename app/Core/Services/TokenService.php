<?php

namespace App\Core\services;
use App\Core\Repositories\TokenRepository;

class TokenService
{

    private static function generateToken(): string
    {
        return TokenRepository::generateToken();
    }

    public static function validateToken(string $token): bool
    {
        return TokenRepository::validateToken($token);
    }

    public static function createToken(int $userID)
    {
        $fechaExpiracion = date('Y-m-d H:i:s', strtotime('+1 day'));
        $token =  TokenService::generateToken();
        return TokenRepository::create($userID, $token, $fechaExpiracion);
    }

    public static function deleteToken($token)
    {
        TokenRepository::deleteByToken($token);
    }
}
