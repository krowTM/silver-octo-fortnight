<?php

namespace VideoImporter\Model;

class Configuration
{
    public $name;

    // csv, json, etc.
    public $format;

    // url, local, etc.
    public $location_type;

    public $location;
}
