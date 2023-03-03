<?php

namespace App\Http\Controllers;

use App\Services\Github\GithubService;
use Illuminate\Http\Request;

class GithubController extends Controller
{
    public function listGithubRepositories()
    {
        $arrayNameRepositories = GithubService::getAllRepositories();

        return view('/dashboard', ['arrayNameRepositories' => $arrayNameRepositories]);
    }

    public function listGraphCommits(Request $request)
    {
        $repositoryName = explode('/', $request->path());

        $arrayCommits = GithubService::getDataCommits($repositoryName[1]);

        return view('/graphs', ['arrayCommits' => $arrayCommits]);
    }
}
