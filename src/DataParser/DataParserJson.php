<?php

namespace VideoImporter\DataParser;

class DataParserJson implements DataParserInterface
{
    private $data;

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    public function parse()
    {
        $data_json = json_decode($this->data);
        $ret = array();
        foreach ($data_json->videos as $data_video) {
            $ret[] = (array) $data_video;
        }

        return $ret;
    }
}
