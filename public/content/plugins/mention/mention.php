<?php
/**
 * Plugin Name: Mention
 */

use Mention\Plugin\Plugin;

/*
 curl -ig 'https://api.mention.net/api/accounts/{account_id}/alerts' \
 -H 'Authorization: Bearer YOUR_ACCESS_TOKEN' \
 -H 'Accept-Version: 1.19'

 */
require __DIR__ . '/composer/autoload.php';


 $plugin = new Plugin(
    '1179733_U9u7kXkS870rExsZ2nNe5SsLLIRUems5dV7Un94Pcktr22l2vaQeOp3ftZCnHYS4',
    'YjExOTRjYTc5MWYwMzczZjI0NjFlY2E2ZDBkZWI4MTZjYTZkNDNmMWVjMDMwMTIxMzdhNzMxMzg5MTM5Mjg4Yw',
 );

 register_activation_hook(
    __FILE__,
    [$plugin, 'activate']
);

register_deactivation_hook(
    __FILE__,
    [$plugin, 'deactivate']
);


