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

/* Make 'store' path appear as 'shorten' to follow the specification. */
$router->post('/shorten', ['as' => 'shorten', 'uses' => 'UrlShortener\ShortenUrlController@store']);

/* Reach form to create a new shortened link at the public root. */
$router->get('/', ['middleware' => 'auth', 'uses' => 'UrlShortener\ShortenUrlController@create']);

$router->get('/listURLs', ['middleware' => 'auth', 'uses' => 'UrlShortener\ShortenUrlController@listURLs']);

/* Resource controllers for url model. */
$router->resource('urls', 'UrlShortener\ShortenUrlController',
    ['only' => ['create', 'store', 'show']]);

$router->get('/register', 'Auth\AuthController@getRegister');
$router->post('/register', 'Auth\AuthController@postRegister');

$router->get('/login', 'Auth\AuthController@getLogin');
$router->post('/login', 'Auth\AuthController@postLogin');
$router->get('/logout', 'Auth\AuthController@getLogout');

/* Use show method to handle request for a specific id. */
$router->get('/{code}', 'UrlShortener\ShortenUrlController@show');



