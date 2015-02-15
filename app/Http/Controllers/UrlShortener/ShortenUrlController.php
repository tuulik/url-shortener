<?php namespace App\Http\Controllers\UrlShortener;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Url;


class ShortenUrlController extends Controller {

    //
    function create() {
        return view('UrlShortener\newurl');
    }

    function store(Request $request, Url $url) {
        $url->url = $request->get('link');
        $code = str_random(8);
        $url->code = $code;
        $url->save();
        return response($code, 200)->header('Content-type', 'text/plain');
    }

    function show($code) {
        $url = Url::whereCode($code)->first();
        return redirect()->away($url->url, 301);
    }
}

