<?php

namespace App\Http\Controllers;

use App\TwitterUser;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TwitterUserController extends Controller
{
    public function index($pageNumber=1)
    {
       return  TwitterUser::skip(($pageNumber-1)*10)->take(10)->get();
    }
}
