<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;

class RegisterController extends Controller
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->post('name');
        $user->email = $request->post('email');
        $user->password = $request->post('password');

        $this->userRepository->create($user);

        return response()->item($user);
    }
}
