<?php

namespace VideoImporter\Model;

class Video
{
    public $name;
    public $url;
    public $tags;

    public function validate()
    {
        if ($this->name != '' &&
            $this->url != '' &&
            $this->tags != ''
        ) {
            return true;
        }

        return false;
    }
}
