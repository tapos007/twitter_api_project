<?php

namespace App\Http\Controllers;

use App\TwitterUser;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TwitterUserController extends Controller
{
    public function index($pageNumber=1)
    {


        $twitter_client = new Client();
        $twitter_client->request()
        /*
         * Setting up the oauth subscriber parameters.  Parameter values have to be generated at the Twitter site
         */
        $twitter_client->addSubscriber(new Guzzle\Plugin\Oauth\OauthPlugin(array(
                'token' => "1472963612-Q5LMBjLAg8urZOvLvtnpJi2Ra4ggAz4t42oqNZZ",
                'token_secret' => "5OvFfmNwpV0Bm8OAfYeBjYQais43mqiPdXBiAjKayL1H2",
                'consumer_key' => "RIVdCsTmG1P1lRbbmojCsZKtd",
                'consumer_secret' => "otgxv2Q5exr9QgE5gWJLK22g6OlXR4vESZx3vll9cAledrpmg7"
        )));

        $request = $twitter_client->get('search/tweets.json');
        $request->getQuery()->set('q', $search);
        $response = $request->send();
        dd($response->getBody()); //we have the parsed response in an array!
       return  TwitterUser::skip(($pageNumber-1)*10)->take(10)->get();
    }
}
