<?php

define( 'WP_USE_THEMES', false );
require __DIR__ . '/wp/wp-load.php';


$query = new WP_Query(['p' => 1]);

$query->the_post();

echo get_the_title();




