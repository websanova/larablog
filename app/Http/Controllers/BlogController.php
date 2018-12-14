<?php

namespace Websanova\Larablog\Http\Controllers;

use Websanova\Larablog\Larablog;
use Illuminate\Support\Facades\Response;
use Illuminate\Routing\Controller as BaseController;

class BlogController extends BaseController
{
    public function feed()
    {
        $content = view('larablog::blog.feed', [
            'last' => Larablog::lastPost(),
            'posts' => Larablog::allPosts()
        ]);

        return Response::make($content, '200')->header('Content-Type', 'text/xml');
    }

    public function atom()
    {
        $content = view('larablog::blog.atom', [
            'last' => Larablog::lastPost(),
            'posts' => Larablog::allPosts()
        ]);

        return Response::make($content, '200')->header('Content-Type', 'text/xml');
    }

    public function sitemap()
    {
        $content = view('larablog::blog.sitemap', [
            'last' => Larablog::lastPost(),
            'posts' => Larablog::allPosts(),
            'pages' => Larablog::allPages(),
            'tags' => Larablog::allTags(),
            'docs' => Larablog::allDocs(),
            'series' => Larablog::allSeries()
        ]);

        return Response::make($content, '200')->header('Content-Type', 'text/xml');
    }

    public function opensearch()
    {
        $content = view('larablog::blog.opensearch');

        return Response::make($content, '200')->header('Content-Type', 'text/xml');
    }
}