<?php

namespace App\View\Components;

use App\Models\Publication;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ServiceSection extends Component
{
    public $services;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Try a more permissive query first
        $this->services = Publication::where('post_type', 'service')->get();
    }

    /**
     * Get the data array for the component.
     */
    public function with()
    {
        return [
            'services' => $this->services,
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.service-section');
    }

    /**
     * Get appropriate Font Awesome icon based on service title.
     */
    public function getServiceIcon($title)
    {
        $title = strtolower($title);
        
        // Map service titles to icons
        $iconMap = [
            'architecture' => 'drafting-compass',
            'interior' => 'couch',
            'design' => 'cube',
            'landscape' => 'tree',
            'bim' => 'sitemap',
            'engineering' => 'cogs',
            'construction' => 'hammer',
            'outsourcing' => 'globe',
            'consulting' => 'handshake',
            'planning' => 'map',
            'development' => 'building',
            'renovation' => 'wrench',
            'project' => 'tasks',
            'management' => 'clipboard-list',
            'legal' => 'balance-scale',
            'financial' => 'chart-line',
            'marketing' => 'bullhorn',
            'research' => 'search',
        ];
        
        // Find matching icon
        foreach ($iconMap as $keyword => $icon) {
            if (strpos($title, $keyword) !== false) {
                return $icon;
            }
        }
        
        // Default icon
        return 'concierge-bell';
    }
}
