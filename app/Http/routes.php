<?php



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$router->get('/', 'UrlShortener\ShortenUrlController@create');

$router->resource('urls', 'UrlShortener\ShortenUrlController',
    ['only' => ['create', 'store', 'show']]);

$router->get('/{code}', 'UrlShortener\ShortenUrlController@show');
