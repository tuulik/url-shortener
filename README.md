# url-shortener

This is an URL shortening service implemented with PHP and Laravel 5.0.

The user can get the id for the shortened link by sending a form which is opened by navigating to the public root.
The form sends the link as a post request to the method at the 'shorten' path. The original URL can be opened
by sending a get request to page /{id}.

The URLs are stored in a SQLite database. The table structure can be found in
/database/migrations/2015_02_13_153205_urls.php. Routes used by the service can be found in /app/Http/routes.php
and the controller used to handle the requests is at /app/Http/Controllers/UrlShortener/ShortenUrlController.php.
The view for creating a new shortened link is at /resources/views/UrlShortener/newurl.blade.php.

The service is running online at http://ec2-52-10-7-168.us-west-2.compute.amazonaws.com/url-shortener/public/.