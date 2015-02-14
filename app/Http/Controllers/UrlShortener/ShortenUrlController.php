<?php namespace App\Http\Controllers\UrlShortener;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Url;


class ShortenUrlController extends Controller {

    //
    function create() {
        $urls = Url::get();
        return view('UrlShortener\newurl', compact('urls'));
    }

    function store(Request $request, Url $url) {
        $NEWURLPATH = 'localhost/url-shortener/public/';
        $url->url = $request->get('link');
        $url->code = str_random(8);
        $url->save();
        return redirect()->route('urls.create');
    }

    function show($code) {
        $url = Url::whereCode($code)->first();
        return redirect()->away($url->url, 301);
    }
}

