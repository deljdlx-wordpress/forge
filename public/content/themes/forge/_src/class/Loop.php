<?php

namespace Deljdlx\WPForge;

use Deljdlx\WPForge\Models\Post;

class Loop
{

    public readonly Theme $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }


    public function getPost()
    {
        global $wp_query;

        $postInstance = new Post();
        $postInstance->loadFromWpPost($wp_query->get_queried_object());
        return $postInstance;
    }

    public function getPosts()
    {

        global $posts;

        foreach ($posts as $post) {
            the_post();
            $postInstance = new Post();
            $postInstance->loadFromWpPost($post);
            yield $postInstance;
        }
    }

}
