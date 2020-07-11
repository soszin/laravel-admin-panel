<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(LoginRequest $request)
    {
        $accessTokenResults = $this->userRepository->login($request->post('email'), $request->post('password'));

        if(is_null($accessTokenResults)) {
            return response()->errorUnauthorized();
        }

        return response()->item($accessTokenResults);
    }
}
