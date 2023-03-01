<?php

namespace App\Services\User;

use App\Repositories\User\UserRepository;

class UserService
{
    public static function updateOrCreateGithubUser($githubUser)
    {
        return UserRepository::updateOrCreateGithubUser($githubUser);
    }
}