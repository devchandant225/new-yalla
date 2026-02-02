<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedBlog extends Component
{
    public $blogs;

    public function __construct($blogs)
    {
        $this->blogs = $blogs;
    }

    public function render(): View|Closure|string
    {
        return view('components.featured-blog');
    }
}