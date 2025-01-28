<?php

namespace App\View\Components\Box;

use Illuminate\View\Component;

class Item extends Component
{
    public string $title;
    public string $color;

    /**
     * Create a new component instance.
     *
     * @param string $title
     * @param string|null $color
     */
    public function __construct(string $title, ?string $color = 'primary')
    {
        $this->title = $title;
        $this->color = $color ?? 'primary'; // Use the default value 'primary' if $color is null.
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.box.item');
    }
}
