<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\Sitemap\SitemapService;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    protected $sitemapService;

    public function __construct(SitemapService $sitemapService)
    {
        $this->sitemapService = $sitemapService;
    }

    public function index()
    {
        return $this->sitemapService->response($this->sitemapService->generateIndex());
    }

    public function posts($page)
    {
        return $this->sitemapService->response($this->sitemapService->generatePosts($page));
    }

    public function pages()
    {
        return $this->sitemapService->response($this->sitemapService->generatePages());
    }

    public function categories()
    {
        return $this->sitemapService->response($this->sitemapService->generateCategories());
    }

    public function news()
    {
        return $this->sitemapService->response($this->sitemapService->generateNews());
    }

    public function videos()
    {
        return $this->sitemapService->response($this->sitemapService->generateVideos());
    }

    public function opinions()
    {
        return $this->sitemapService->response($this->sitemapService->generateOpinions());
    }

    public function probashi()
    {
        return $this->sitemapService->response($this->sitemapService->generateProbashi());
    }
}
