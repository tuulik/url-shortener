<?php namespace App\Http\Controllers\UrlShortener;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Url;


class ShortenUrlController extends Controller {

    //
    /**
     * @return \Illuminate\View\View
     */
    function create() {
        return view('UrlShortener\newurl');
    }

    /**
     * @param Request $request
     * @param Url $url
     * @return mixed
     */
    function store(Request $request, Url $url) {
        $url->url = $request->get('link');
        /* Generate new id for the link if the id is already in the database. */
        do {
            $code = str_random(8);
        } while(!Url::whereCode($code)->get()->isEmpty());
        $url->code = $code;
        $url->save();
        return response($code, 200)->header('Content-type', 'text/plain');
    }

    /**
     * @param $code
     * @return \Illuminate\Contracts\Routing\ResponseFactory|
     *         \Illuminate\Http\RedirectResponse|
     *         \Symfony\Component\HttpFoundation\Response
     */
    function show($code) {
        $url = Url::whereCode($code)->first();
        if($url === null)
            return response('Not Found (404)', 404);
        return redirect()->away($url->url, 301);
    }
}

