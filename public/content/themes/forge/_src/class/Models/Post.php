<?php

namespace Deljdlx\WPForge\Models;

use Corcel\Model\Post as ModelPost;
use WP_Post;

class Post extends ModelPost
{
    public readonly WP_Post $wpPost;

    public function loadFromWpPost(WP_Post $post)
    {
        $this->wpPost = $post;
        foreach ($post as $attribute => $value) {
            $this->$attribute = $value;
        }
    }


    public function getThumbnail()
    {
        return get_the_post_thumbnail_url();
    }

    public function getPermalink()
    {
        return $this->guid;
    }

    public function getTitle()
    {
        return $this->post_title;
    }

    public function getExcerpt()
    {
        return get_the_excerpt();
    }

    public function getAuthor()
    {
        return get_the_author_meta('display_name');
    }

    public function getContent()
    {
        return get_the_content();
    }

    public function getTags()
    {
        return $this->getTerms('post_tag');
    }

    public function getTerms(string $taxonomy)
    {
        return get_the_terms($this->wpPost, $taxonomy);
    }

    public function getCategories()
    {
        return get_the_category();
    }

    public function getDate(string $format = 'Y-m-d H:i:s')
    {
        return get_the_date($format);
    }
}

