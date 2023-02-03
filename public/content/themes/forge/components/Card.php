<?php

namespace Deljdlx\WPForge\Components;

use Illuminate\View\Component;

class Card extends Component
{

    private $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return \view(
            'components.card',
            ['post' => $this->post],
        );
    }
}

