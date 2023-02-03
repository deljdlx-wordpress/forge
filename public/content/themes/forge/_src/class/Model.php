<?php

namespace Deljdlx\WPForge;


use Corcel\Database;
use Corcel\Model\Post;

class Model
{

    public readonly Theme $theme;

    private $corcel;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
        $this->initializeCorcel();
    }


    private function initializeCorcel()
    {
        global $table_prefix;
        $params = [
            'database'  => DB_NAME,
            'username'  => DB_USER,
            'password'  => DB_PASSWORD,
            'prefix'    => $table_prefix,
        ];
        $this->corcel = \Corcel\Database::connect($params);
    }

}