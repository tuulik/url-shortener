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
$router->get('/', 'UrlShortener\ShortenUrlController@create');

/* Resource controllers for url model. */
$router->resource('urls', 'UrlShortener\ShortenUrlController',
    ['only' => ['create', 'store', 'show']]);

/* Use show method to handle request for a specific id. */
$router->get('/{code}', 'UrlShortener\ShortenUrlController@show');
