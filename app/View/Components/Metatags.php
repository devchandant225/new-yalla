<?php

namespace App\View\Components;

use App\Models\Metatag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Metatags extends Component
{
    public $metatag;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $currentUrl = request()->path();
        
        // Map URLs to page identifiers
        $pageMap = [
            '/' => 'home',
            'about' => 'about',
            'about/introduction' => 'about',
            'about/executive-committee' => 'about',
            'team' => 'team',
            'services' => 'service',
            'practice-area' => 'practice-area',
            'contact' => 'contact',
            'awards' => 'awards',
        ];

        // Find the matching page identifier
        $pageIdentifier = null;
        foreach ($pageMap as $url => $identifier) {
            if ($currentUrl === $url || str_starts_with($currentUrl, $url)) {
                $pageIdentifier = $identifier;
                break;
            }
        }

        // Fetch metatag from database
        if ($pageIdentifier) {
            $this->metatag = Metatag::where('page', $pageIdentifier)->first();
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.metatags');
    }
}
