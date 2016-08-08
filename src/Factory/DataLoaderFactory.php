<?php

namespace VideoImporter\Factory;

use VideoImporter\Model\Configuration;
use VideoImporter\DataLoader\DataLoaderLocal;

class DataLoaderFactory
{
    /**
     * Gets a new DataLoderInterface object based on configuration.
     *
     * @param Configuration $configuration The configuration object
     *
     * @return object
     */
    public static function get(Configuration $configuration)
    {
        switch ($configuration->location_type) {
            case 'local':
                $data_loader = new DataLoaderLocal();
                $data_loader->setLocation($configuration->location);

                return $data_loader;
                break;
            default:
                throw new InvalidOptionException('Invalid location type.');
        }
    }
}
