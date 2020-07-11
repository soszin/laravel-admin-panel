<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{
    public function create(Model $model): Model;

    public function find(int $id): ?Model;
}