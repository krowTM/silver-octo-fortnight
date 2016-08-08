<?php

namespace VideoImporter\DataLoader;

interface DataLoaderInterface
{
    /**
     * Sets location of data.
     *
     * @param string $location Location of data
     */
    public function setLocation($location);

    /**
     * Gets the data from the location.
     *
     * @return string
     */
    public function load();
}
