<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\PostThreadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

require('api/auth.php');

require('api/user-follower.php');

require('api/user-following.php');

require('api/user.php');

require('api/thread.php');

require('api/thread-reply.php');

require('api/thread-like.php');
