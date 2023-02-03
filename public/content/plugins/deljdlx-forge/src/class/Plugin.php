<?php

namespace Deljdlx\WPForge\Plugin;

class Plugin
{

    protected Cpt $cpt;

    public function __construct()
    {

        $this->cpt = new Cpt($this);

        $this->initialize();


    }


    public function activate()
    {

    }

    public function deactivate()
    {

    }



    protected function initialize()
    {

    }
}
