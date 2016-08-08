<?php

namespace VideoImporter\Factory;

use VideoImporter\Model\Configuration;
use VideoImporter\DataParser\DataParserJson;
use VideoImporter\DataParser\DataParserYaml;

class DataParserFactory
{
    /**
     * Gets a new DataParserInterface object based on configuration.
     *
     * @param Configuration $configuration The configuration object
     *
     * @return object
     */
    public static function get(Configuration $configuration)
    {
        switch ($configuration->format) {
            case 'json':
                $data_parser = new DataParserJson();

                return $data_parser;
                break;
            case 'yaml':
                $data_parser = new DataParserYaml();

                return $data_parser;
                break;
            default:
                throw new InvalidOptionException('Invalid format.');
        }
    }
}
