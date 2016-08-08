<?php

namespace VideoImporter\Factory;

use VideoImporter\DataPersistence\DataPersistenceMysql;

class DataPersistenceFactory
{
    /**
     * Gets a new DataPersistanceInterface object based on type.
     *
     * @param string $type The type of persistance(mysql, cassandra, etc.)
     *
     * @return object
     */
    public static function get($type)
    {
        switch ($type) {
            case 'mysql':
                $persistance = new DataPersistenceMysql();

                return $persistance;
                break;
            default:
                throw new InvalidOptionException(
                    'Invalid data persistance type.'
                );
        }
    }
}
