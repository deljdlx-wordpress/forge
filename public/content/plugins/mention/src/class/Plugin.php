<?php

namespace Mention\Plugin;

class Plugin
{

    private Client $client;

    private $createPostHooksEnabled = true;

    private $account;
    private $token;

    public function __construct(string $account, string $token)
    {
        $this->account = $account;
        $this->token = $token;

        $this->client = new Client(
            $this->account,
            $this->token
        );

        add_action('init', [$this, 'initialize']);
        add_action('wp_insert_post', [$this, 'createAlert'], 10 , 3);
        add_action('trashed_post', [$this, 'deleteAlert'], 10 , 1);
    }

    public function initialize()
    {
        $this->createAlertCpt();
        $this->createSourceTaxonomy();
    }

    public function deleteAlert($postId)
    {
        $this->createPostHooksEnabled = false;
        $alertId = get_field('mention_id', $postId);
        $this->client->deleteShares($alertId);
    }

    public function createAlert($postId, $post, $update = false)
    {
        if($post->post_type !== 'mention-alert') {
            return;
        }

        if(!$this->createPostHooksEnabled) {
            return;
        }

        if($post->post_status === 'auto-draft') {
            return;
        }

        $includedKeywords = get_field('included_keywords', $postId);
        $requiredKeywords = get_field('required_keywords', $postId);
        $excludedKeywords = get_field('excluded_keywords', $postId);

        $terms =  get_the_terms($postId, 'mention-source');

        $sources = [];
        foreach ($terms as $term) {
            $sources[] = $term->slug;
        }

        if(!empty($sources)) {

            if(get_field('mention_id', $postId)) {
                $alert = $this->client->updateAlert(
                    get_field('mention_id'),
                    $post->post_title,
                    explode("\n", $includedKeywords),
                    explode("\n", $requiredKeywords),
                    explode("\n", $excludedKeywords),
                    $sources,
                );

                return;
            }

            $alert = $this->client->createAlert(
                $post->post_title,
                explode("\n", $includedKeywords),
                explode("\n", $requiredKeywords),
                explode("\n", $excludedKeywords),
                $sources,
            );

            update_field('mention_id', $alert->id);
        }
    }

    public function createAlertCpt()
    {
        $alertCpt = new CustomPostType('mention-alert', 'Alert');
        $alertCpt->disableSupport('editor');
        $alertCpt->disableSupport('comments');
        $alertCpt->create();
    }

    public function createSourceTaxonomy()
    {
        register_taxonomy(
            'mention-source',
            ['mention-alert'],
            [
                'show_in_rest' => true,
                'label' => 'Sources',
                'hierarchical' => false,
                'public' => true
            ]
        );
    }

    public function createSources()
    {
        $sources = [
            "facebook",
            "instagram",
            "twitter",
            "forums",
            "web",
            "blogs",
            "videos",
            "news",
            "tiktok"
        ];

        $sourcesByName = [];
        foreach ($sources as $source) {
            $id = wp_insert_term($source, 'mention-source');
            $sourcesByName[$source] = $id;
        }

        return $sourcesByName;
    }


    public function activate()
    {

        $this->createPostHooksEnabled = false;

        $this->createAlertCpt();
        $this->createSourceTaxonomy();


        $taxonomy = 'mention-source';
        $terms = get_terms( array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false
        ) );

        foreach ( $terms as $term ) {
            wp_delete_term($term->term_id, $taxonomy);
        }

        $sourcesByName = $this->createSources();
        $alerts = $this->client->getAlerts();


        $user = wp_get_current_user();


        foreach ($alerts as $alert) {
            $alertId = wp_insert_post([
                'post_author' => $user->id,
                'post_type' => 'mention-alert',
                'post_status' => 'publish',
                'post_title' => $alert->name,
            ]);


            $alertSources = [];

            foreach ($alert->sources as $sourceName) {
                if(array_key_exists($sourceName, $sourcesByName)) {
                    $alertSources[] = $sourcesByName[$sourceName]['term_id'];
                }
            }
            wp_set_post_terms(
                $alertId,
                $alertSources,
                'mention-source'
            );

            update_field(
                "mention_id",
                $alert->id,
                $alertId,
            );


            if(isset($alert->primary_keyword)) {
                update_field(
                    "included_keywords",
                    $alert->primary_keyword,
                    $alertId,
                );
            }

            if(isset($alert->included_keywords)) {
                update_field(
                    "included_keywords",
                    $alert->primary_keyword . "\n" . implode("\n", $alert->included_keywords),
                    $alertId,
                );
            }

            if(isset($alert->required_keywords)) {
                update_field(
                    "required_keywords",
                    implode("\n", $alert->required_keywords),
                    $alertId,
                );
            }

            if(isset($alert->excluded_keywords)) {
                update_field(
                    "excluded_keywords",
                    implode("\n", $alert->excluded_keywords),
                    $alertId,
                );
            }

            /*
            $alert->setMention(
                $this->client->getMentions($alert->id),
            );
            */
        }
    }

    public function deactivate()
    {
        $alerts= get_posts( array('post_type'=>'mention-alert','numberposts'=>-1) );
        foreach ($alerts as $alert) {
            wp_delete_post( $alert->ID, true );
        }


        $taxonomy = 'mention-source';
        $terms = get_terms( array(
            'taxonomy' => $taxonomy,
            'hide_empty' => false
        ) );

        foreach ( $terms as $term ) {
            wp_delete_term($term->term_id, $taxonomy);
        }
    }
}
