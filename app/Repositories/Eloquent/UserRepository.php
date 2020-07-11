<?php


namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\PersonalAccessTokenResult;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @param User $model
     * @return User
     * @throws \Exception
     */
    public function create($model): User
    {
        if(!$model instanceof User) {
            throw new \Exception("Declaration must be compatible with ".User::class);
        }
        /** @var User $user */
        $user = parent::create($model);

        return $user;
    }

    public function authorize(string $email, string $password, bool $rememberMe = false): bool
    {
        $credential = [
            'email' => $email,
            'password' => $password,
        ];

        return Auth::attempt($credential, $rememberMe);
    }

    public function login(string $email, string $password, bool $rememberMe = false): ?PersonalAccessTokenResult
    {
        if($this->authorize($email, $password, $rememberMe)) {

            /** @var User $user */
            $user = Auth::user();
            return $user->createToken('Personal Access Token');
        }

        return null;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }
}