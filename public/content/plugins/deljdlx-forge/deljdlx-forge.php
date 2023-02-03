<?php
/**
 * Plugin Name: Deljdlx Forge
 */

use Deljdlx\WPForge\Plugin\Plugin;


require __DIR__ . '/composer/autoload.php';




 $plugin = new Plugin();

 register_activation_hook(
    __FILE__,
    [$plugin, 'activate']
);

register_deactivation_hook(
    __FILE__,
    [$plugin, 'deactivate']
);


