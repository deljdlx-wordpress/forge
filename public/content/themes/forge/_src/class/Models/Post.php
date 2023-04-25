<?php

namespace Deljdlx\WPForge\Models;

use Corcel\Model\Post as ModelPost;
use DOMDocument;
use DOMXPath;
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

    public function getExcerpt($ending = '...'): string
    {

        return get_the_excerpt();

        // return get_the_content();
        $content = get_the_content();
        $length = 1000;

        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML('<?xml encoding="utf-8" ?>' . $content);
        $xpath = new DOMXPath($doc);
        $nodes = $xpath->query("//text()[not(ancestor::script)][not(ancestor::style)]");
        $excerpt = '';
        $count = 0;
        foreach ($nodes as $node) {
            $text = $node->nodeValue;
            $words = preg_split("/[\n\r\t ]+/", $text, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($words as $word) {
                if ($count >= $length) {
                    $excerpt .= $ending;
                    return $excerpt;
                }
                $excerpt .= $word . ' ';
                $count++;
            }
        }
        // $excerpt = trim(strip_tags($excerpt));
        $excerpt .= $ending;
        return $excerpt;


        // return get_the_excerpt();
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

