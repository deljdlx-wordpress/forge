<?php

namespace Mention\Plugin;

class CustomPostType
{


    protected $identifier;
    protected $label;


    protected $supports = [
        'title',
        'editor',
        'thumbnail',
        // 'excerpt',
        // 'author',
        'comments',
        // 'custom-fields'
    ];


    public function __construct($identifier, $label)
    {
        $this->identifier = $identifier;
        $this->label = $label;
    }


    public function enableSupport($name)
    {
        $this->supports[$name];
    }

    public function disableSupport($name)
    {
        $key = array_search($name, $this->supports);
        if($key !== false) {
            unset($this->supports[$key]);
        }
    }

    public function initialize()
    {
        add_action('init', [$this, 'create'], 50);
    }

    public function create()
    {
        $labels = [
            'name' => $this->label,
            'singular_name' => $this->label,
            'menu_name' => $this->label,
            'all_items' => $this->label . ' list',
            'view_item' => 'View ' . mb_strtolower($this->label),
            'add_new_item' => 'New ' . mb_strtolower($this->label),
            'add_new' => 'New ' . mb_strtolower($this->label),
            'edit_item' => 'Edit ' . mb_strtolower($this->label),
            'update_item' => 'Edit ' . mb_strtolower($this->label),
            'search_items' => $this->label . ' search',
            'not_found' => 'No ' . mb_strtolower($this->label) . ' found',
            'not_found_in_trash' => 'No ' . mb_strtolower($this->label) . ' found in trash',
        ];

        register_post_type(
            $this->identifier,
            [
                'label' => $this->label,
                'labels' => $labels,
                'public' => true,
                'hierarchical' => false,
                'show_in_rest' => true,
                'capability_type' => $this->identifier,
                'map_meta_cap' => true,
                'supports' => $this->supports
            ]
        );

        $this->grantAllCapabilitiesToAdministrator();
    }

    public function grantAllCapabilitiesToAdministrator()
    {
        $role = get_role('administrator');
        $capabilities = [
            "delete_others_{$this->identifier}s",
            "delete_private_{$this->identifier}s",
            "delete_published_{$this->identifier}s",
            "delete_{$this->identifier}s",
            "edit_others_{$this->identifier}s",
            "edit_private_{$this->identifier}s",
            "edit_published_{$this->identifier}s",
            "edit_{$this->identifier}s",
            "publish_{$this->identifier}s",
            "read_private_{$this->identifier}s",
        ];

        foreach($capabilities as $capability) {
            $role->add_cap($capability);
        }
    }
}
