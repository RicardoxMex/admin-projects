<?php
namespace App\Auth;

use App\Core\Services\UserService;
use App\Utils\Controller;
use App\Utils\Session;
use App\Utils\Views;

class AuthController extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = Session::getSession('data');
        Views::setViewPath('auth.index');
        Views::setTitle("Auth");
        Views::setLayout('login');
        Views::setData(['data' => $data]);
        Views::render();
    }

    public function signIn($request)
    {
        $login = AuthService::login($request->username, $request->password);

        if ($login) {
            redirect('');
        }else{
            redirect('auth');
        }
    }

    public function signUp($request)
    {
        if (UserService::validateRequest() === true) {
            $user = UserService::create($request->username, $request->email, $request->password);
            if ($user !== null) {
                AuthService::login($request->username, $request->password);
                redirect('');
            } else {
                redirect('auth#sign-up');
            }
        } else {
            redirect('auth#sign-up');
        }
    }

    public function logout()
    {
        AuthService::logout();
        redirect('auth');
    }
}