<?php

namespace VideoImporter\DataParser;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class DataParserYaml implements DataParserInterface
{
    private $data;

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function parse()
    {
        try {
            $data = Yaml::parse($this->data);

            return $data;
        } catch (ParseException $e) {
            throw $e;
        }
    }
}
