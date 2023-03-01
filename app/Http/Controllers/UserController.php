<?php

namespace App\Http\Controllers;

use App\Services\User\UserService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function updateOrCreateGithubUser()
    {
        $githubUser = Socialite::driver('github')->user();

        $user = UserService::updateOrCreateGithubUser($githubUser);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
