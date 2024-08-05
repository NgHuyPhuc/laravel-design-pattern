<?php

namespace App\Repositories\Repository;

use App\Repositories\BaseRepository;
use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $userRepository;
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
