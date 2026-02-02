<?php

namespace App\View\Components;

use App\Models\Publication;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PracticeSection extends Component
{
    public $practices;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // Fetch practice areas from database
        $this->practices = Publication::where('post_type', 'practice')
            ->where('status', 'active')
            ->orderBy('orderlist', 'asc')
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.practice-section');
    }

    /**
     * Get appropriate Font Awesome icon based on practice area title.
     */
    public function getPracticeIcon($title)
    {
        $title = strtolower($title);
        
        // Map practice area titles to legal icons
        $iconMap = [
            'criminal' => 'gavel',
            'civil' => 'handshake',
            'corporate' => 'building',
            'family' => 'home',
            'immigration' => 'passport',
            'personal injury' => 'user-injured',
            'real estate' => 'house-user',
            'employment' => 'briefcase',
            'intellectual property' => 'lightbulb',
            'tax' => 'receipt',
            'bankruptcy' => 'money-bill-wave',
            'contract' => 'file-contract',
            'litigation' => 'balance-scale',
            'business' => 'chart-line',
            'commercial' => 'store',
            'property' => 'key',
            'finance' => 'dollar-sign',
            'insurance' => 'shield-alt',
            'medical' => 'user-md',
            'environmental' => 'leaf',
            'labor' => 'users',
            'administrative' => 'clipboard-list',
            'constitutional' => 'flag',
            'international' => 'globe',
            'maritime' => 'anchor',
            'aviation' => 'plane',
            'energy' => 'bolt',
            'technology' => 'laptop-code',
            'healthcare' => 'heartbeat',
            'education' => 'graduation-cap',
        ];
        
        // Find matching icon
        foreach ($iconMap as $keyword => $icon) {
            if (strpos($title, $keyword) !== false) {
                return $icon;
            }
        }
        
        // Default icon for legal practices
        return 'balance-scale';
    }
}