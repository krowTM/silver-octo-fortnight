<?php

namespace VideoImporter\Factory;

use VideoImporter\Model\Configuration;

class ConfigurationFactory
{
    /**
     * Gets a new Configuration object base on source name.
     *
     * @param string $name The name of the source
     *
     * @return object
     */
    public static function get($name)
    {
        $configuration = new Configuration();
        $configuration->name = $name;

        switch ($name) {
            case 'glorf':
                $configuration->format = 'json';
                $configuration->location_type = 'local';
                $configuration->location = 'feed-exports/glorf.json';
                break;
            case 'flub':
                $configuration->format = 'yaml';
                $configuration->location_type = 'local';
                $configuration->location = 'feed-exports/flub.yaml';
                break;
            default:
                throw new \InvalidArgumentException('Source does not exist.');
                break;
        }

        return $configuration;
    }
}
