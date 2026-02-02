<?php

namespace App\View\Components;

use App\Models\Publication;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MorePractices extends Component
{
    public $practices;
    public $currentPracticeId;
    public $limit;

    /**
     * Create a new component instance.
     */
    public function __construct($currentPracticeId = null, $limit = 8)
    {
        $this->currentPracticeId = $currentPracticeId;
        $this->limit = $limit;

        // Get practice areas from database, excluding current practice area
        $query = Publication::where('post_type', 'practice-area')
            ->where('status', 'active')
            ->orderBy('orderlist', 'asc')
            ->orderBy('created_at', 'desc');
        
        if ($this->currentPracticeId) {
            $query->where('id', '!=', $this->currentPracticeId);
        }
        
        $this->practices = $query->take($this->limit)->get();
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.more-practices');
    }
}