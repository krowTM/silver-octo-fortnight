<?php

namespace VideoImporter\DataLoader;

use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class DataLoaderLocal implements DataLoaderInterface
{
    private $location;

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function load()
    {
        if (!file_exists($this->location)) {
            throw new FileNotFoundException(
                $this->location.' does not exist.'
               );
        }
        $data = file_get_contents($this->location);

        if ($data === false) {
            throw new \Exception('Unable to read '.$this->location);
        }

        return $data;
    }
}
