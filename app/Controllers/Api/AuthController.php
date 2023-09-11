<?php

namespace App\Controllers\Api;

use App\Auth\AuthService;
use App\Auth\User;
use App\Core\Services\TokenService;
use App\Core\Services\UserService;
use App\Utils\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Pagination\Paginator;

class AuthController
{
    public static function getToken()
    {
        try {
            $headers = apache_request_headers();
            if (!isset($headers['Authorization'])) {
                return errorResponse('Unauthenticated request', 403);
            }
            $autorization = $headers['Authorization'];
            $autorizationArray = explode(' ', $autorization);
            $token = $autorizationArray[1];

            return JWT::decode($token, new Key(API_KEY, 'HS256'));
        } catch (\Throwable $th) {
            return errorResponse($th->getMessage(), 403);
        }
    }

    public static function validateToken()
    {
        $info = self::getToken();
        $user = User::where('id', $info->data)->first();
        return $user;
    }

    public function auth()
    {
        $request = Request::getRequest();
        $now = strtotime("now");

        $user = AuthService::auth($request->email, $request->password);
        if ($user) {
            $payload = [
                'exp' => $now + 2629800,
                'data' => $user->id
            ];
            $jwt = JWT::encode($payload, API_KEY, 'HS256');
            AuthService::createSession($jwt, $user->username);
            TokenService::createToken($user->id, $jwt);
            successResponse(['token' => $jwt]);
        } else {
            errorResponse('invalid email and password', 400);
        }
    }

    public function token($email, $password)
    {
        $now = strtotime("now");
        $user = AuthService::auth($email, $password);
        if ($user) {
            $payload = [
                'exp' => $now + 2629800,
                'data' => $user->id
            ];
            $jwt = JWT::encode($payload, API_KEY, 'HS256');
            return $jwt;
        }
    }

    public function signin($request)
    {
        $request = $request->getRequest();
        if (UserService::validateRequestApi() === true) {
            $user = UserService::create($request->username, $request->email, $request->password);
            $jwt = $this->token($request->email, $request->password);
            $response = [
                'user' => $user,
                'token' => $jwt
            ];
            AuthService::createSession($jwt, $user->username);
            TokenService::createToken($user->id, $jwt);
            successResponse($response);
        }

    }

    public function users()
    {
        if (!$this->validateToken()) {
            return errorResponse('Unauthorized', 403);
        }

        $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $itemsPerPage = 3; // Cambia esto al número deseado de elementos por página

        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

        $users = User::paginate($itemsPerPage);

        if ($users) {
            return successResponse($users);
        }
    }

    public function validateTokenAPI()
    {
        if (!$this->validateToken()) {
            return errorResponse('Unauthorized', 403);
        }

        return successResponseCustom($this->validateToken());
    }
}