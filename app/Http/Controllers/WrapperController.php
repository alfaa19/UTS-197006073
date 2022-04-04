<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WrapperController extends Controller
{
    public function sharddata(Request $request)
    {
        $key = $request->api_key;
        $json = Http::get( 'https://na1.api.riotgames.com/lol/status/v3/shard-data?api_key='.$key)->json();
        return response()->json($json);
    }

    public function championRotations(Request $request){
        $key = $request->api_key;
        $json = Http::get( 'https://na1.api.riotgames.com/lol/platform/v3/champion-rotations?api_key='.$key)->json();
        return response()->json($json);
    }

    public function summonerByName($summonerName, Request $request){
        $key = $request->api_key;
        $json = Http::get( 'https://na1.api.riotgames.com/lol/summoner/v4/summoners/by-name/'.$summonerName.'?api_key='.$key)->json();
        return response()->json($json);

    }

    public function  allLeagueEntries($queue,$tier,$division, Request $request){
        $key = $request->api_key;
        $page = $request->page;
        $json = Http::get('https://na1.api.riotgames.com/lol/league/v4/entries/'.$queue.'/'.$tier.'/'.$division.'?page='.$page.'&api_key='.$key)->json();
        return response()->json($json);
    }

    public function featured(Request $request){
        $key = $request->api_key;
        $json = Http::get('https://na1.api.riotgames.com/lol/spectator/v4/featured-games?api_key='.$key)->json();
        return response()->json($json);
    }

}

