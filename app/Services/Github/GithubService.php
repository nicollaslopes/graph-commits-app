<?php

namespace App\Services\Github;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class GithubService
{
    public static function getAllRepositories(): array
    {
        $githubAttributes = Auth::User()->getAttributes();
        $githubNickname = $githubAttributes['nickname'];

        $githubRepositories = Http::get("https://api.github.com/users/$githubNickname/repos");
       
        $githubRepositoriesJson = json_decode($githubRepositories->getBody());

        $arrayNameRepositories = [];

        foreach ($githubRepositoriesJson as $githubRepository) {
            array_push($arrayNameRepositories, $githubRepository->name);
        }

        return $arrayNameRepositories;
    }
}