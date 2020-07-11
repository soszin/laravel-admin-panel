<?php


namespace App\Repositories;


use Illuminate\Support\Collection;
use Laravel\Passport\PersonalAccessTokenResult;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function authorize(string $email, string $password, bool $rememberMe = false): bool;

    public function login(string $email, string $password, bool $rememberMe = false): ?PersonalAccessTokenResult;

    public function all(): Collection;
}