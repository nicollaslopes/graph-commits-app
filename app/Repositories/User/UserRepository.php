<?php

namespace App\Repositories\User;

use App\Models\User;

class UserRepository
{
    public static function updateOrCreateGithubUser($githubUser)
    {
        $githubUser = User::updateOrCreate([
            'github_id' => $githubUser->id
        ],[
            'name' => $githubUser->name,
            'nickname' => $githubUser->nickname,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken
        ]);

        return $githubUser;
    }
}