<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageBanner extends Component
{
    public $title;
    public $description;
    public $videoUrl;

    /**
     * Create a new component instance.
     */
    public function __construct($title = '', $description = '', $videoUrl = 'video-1.mp4')
    {
        $this->title = $title;
        $this->description = $description;
        $this->videoUrl = $videoUrl;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page-banner');
    }
}
