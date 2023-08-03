<?php

namespace App\Controllers\Api;

use App\Auth\AuthService;
use App\Auth\User;
use App\Utils\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Pagination\Paginator;

class AuthController{

    public function getToken() {
        $headers = apache_request_headers();
        if(!isset($headers['Authorization'])){
            return errorResponse('Unauthenticated request', 403);
        }
        $autorization = $headers['Authorization'];
        $autorizationArray = explode(' ', $autorization);
        $token = $autorizationArray[1];
        try {
            return JWT::decode($token, new Key(API_KEY, 'HS256'));
        } catch (\Throwable $th) {
            return errorResponse($th->getMessage(), 403);
        }
    }

    function validateToken() {
        $info = $this->getToken();
        $user = User::where('id', $info->data)->first();
        return  $user;
    }

    public function auth(){
        $request = Request::getRequest();
        $now = strtotime("now");
        
        $user = AuthService::auth($request->email, $request->password);
        if($user){
            $payload = [
                'exp' => $now + 3600,
                'data' =>$user->id
            ];
            $jwt = JWT::encode($payload, API_KEY, 'HS256');
            successResponse(['token' => $jwt]);
        }else{
            errorResponse('error', 400);
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
}