<?php

namespace VideoImporter\DataParser;

interface DataParserInterface
{
    /**
     * Sets data to parse.
     *
     * @param string $data String with data
     * 
     * @return object
     */
    public function setData($data);

    /**
     * Parses the data and returns array.
     *
     * @return array
     */
    public function parse();
}
