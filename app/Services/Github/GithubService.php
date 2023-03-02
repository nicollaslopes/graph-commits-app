<?php

namespace App\Services\Github;

use Illuminate\Http\Client\Request;
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

    public static function getDataCommits($repositoryName): array
    {
        $githubAttributes = Auth::User()->getAttributes();
        $githubNickname = $githubAttributes['nickname'];

        $commitsResponse = Http::get("https://api.github.com/repos/$githubNickname/$repositoryName/commits");
        $commitsResponseArray = json_decode($commitsResponse->getBody());

        $arrayCommits = [];
        $arrayCommits['name'] = $repositoryName;

        $dateToday = new \Datetime();

        foreach ($commitsResponseArray as $keyDate => $commit) {
            $dateCommit = date('d-m-Y', strtotime($commit->commit->committer->date));
            $dateCommitFormat = new \Datetime($dateCommit);

            $interval = $dateToday->diff($dateCommitFormat);

            if ($interval->days < 90) {
                $arrayCommits['date'][$keyDate] = $dateCommit;
            }
        }

        return $arrayCommits;
    }
}