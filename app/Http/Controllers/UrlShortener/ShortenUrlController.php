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
        do {
            $code = str_random(8);
        } while(!Url::whereCode($code)->get()->isEmpty());
        $url->code = $code;
        $url->save();
        return response($code, 200)->header('Content-type', 'text/plain');
    }

    function show($code) {
        $url = Url::whereCode($code)->first();
        if($url === null)
            return response('Not Found (404)', 404);
        return redirect()->away($url->url, 301);
    }
}

