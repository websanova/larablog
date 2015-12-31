<?php

namespace Websanova\Larablog\Http\Controllers;

use Redirect;
use Response;
use Websanova\Larablog\Larablog;
use Illuminate\Routing\Controller as BaseController;

class BlogController extends BaseController
{
    public function feed()
    {
        $content = view('larablog::blog.feed', [
            'last' => Larablog::last(),
            'posts' => Larablog::all()
        ]);

        return Response::make($content, '200')->header('Content-Type', 'text/xml');
    }

    public function sitemap()
    {
        $content = view('larablog::blog.sitemap', [
            'last' => Larablog::last(),
            'posts' => Larablog::all()
        ]);

        return Response::make($content, '200')->header('Content-Type', 'text/xml');
    }

    public function opensearch()
    {
        $content = view('larablog::blog.opensearch');

        return Response::make($content, '200')->header('Content-Type', 'text/xml');
    }
}