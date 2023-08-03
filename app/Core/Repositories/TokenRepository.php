<?php
namespace App\Core\Repositories;
use App\Entities\Token;

class TokenRepository {
    public static function create(int $userID, string $token,  $expires_at){
        $tokenModel = Token::create([
            "user_id"=>$userID,
            "token"=>$token,
            "expires_at"=>$expires_at
        ]);
        return $tokenModel;
    }

    public static function findByToken(string $token)
    {
        return Token::where('token', $token)->first();
    }

    public static function deleteByToken(string $token)
    {
        Token::where('token', $token)->delete();
    }

    public static function generateToken() : string {
        $token = bin2hex(random_bytes(32));
        return $token;
    }

    public static function validateToken(string $token): bool{
        $token = Token::where('token', $token)->where('expires_at', '>', date('Y-m-d H:i:s'))->first();
        if($token !==null){
            return true;
        }
        return false;
    }
}