<?php

namespace Mention\Plugin;

class Mention
{
    private ?Alert $alert = null;



    public static function fromObject($object): Mention
    {
        $mention = new static();
        return $mention;

        foreach ($object as $attribute => $value) {
            $mention->$attribute = $value;
        }

        return $mention;
    }
}
