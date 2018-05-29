<?php

namespace App\Http\Controllers;

use App\TwitterUser;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Subscriber\Oauth\Oauth1;
use Illuminate\Http\Request;

class TwitterUserController extends Controller
{
    public function index($pageNumber=1)
    {
       return  TwitterUser::skip(($pageNumber-1)*10)->take(10)->get();
    }

    public function test($pageNumber=1)
    {
        $userData = TwitterUser::skip(($pageNumber-1)*10)->take(10)->get()->pluck('twitter_name')->toArray();
        $userString = "";
        foreach ($userData as $key=>$value){
            $userString .=$value;
            if((count($userData)-1)!=$key){
                $userString .=",";
            }
        }


        $stack = HandlerStack::create();

        $middleware = new Oauth1([
            'consumer_key'    => env('TWITTER_CONSUMER'),
            'consumer_secret' => env('TWITTER_CONSUMER_SECRET'),
            'token'           => env('TWITTER_TOKEN'),
            'token_secret'    => env('TWITTER_TOKEN_SECRET')
        ]);

        $stack->push($middleware);

        $client = new Client([
            'base_uri' => 'https://api.twitter.com/1.1/',
            'handler' => $stack,
            'auth' => 'oauth',
            'query'=>['screen_name'=>$userString]
        ]);

        $res = $client->get('users/lookup.json');
        $obj = json_decode($res->getBody());
        return $obj;


    }
}
