<?php

namespace Mention\Plugin;

class Alert
{

    /**
     * @var Mention[]
     */
    private $mentions = [];

    public function setMention(array $mentions): self
    {
        $this->mentions = $mentions;
        return $this;
    }

    public function getMentions()
    {
        return $this->mentions;
    }

    public static function fromObject($object): Alert
    {
        $alert = new static();

        foreach ($object as $attribute => $value) {
            $alert->$attribute = $value;
        }

        return $alert;
    }

}

