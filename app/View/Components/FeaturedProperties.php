<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class FeaturedProperties extends Component
{
    /**
     * The featured properties.
     *
     * @var Collection
     */
    public $properties;

    /**
     * Create a new component instance.
     *
     * @param Collection $properties
     */
    public function __construct(Collection $properties)
    {
        $this->properties = $properties;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.featured-properties');
    }
}
