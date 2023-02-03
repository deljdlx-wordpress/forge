<?php

namespace Deljdlx\WPForge\Components;

use Illuminate\View\Component;

class RandomNumber extends Component
{
    protected $min = 0;
    protected $max = 100;

    public function __construct($min = 0, $max=100)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function render()
    {
        return mt_rand($this->min, $this->max);
    }
}

