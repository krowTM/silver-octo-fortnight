<?php

namespace Tests\VideoImporter\DataParser;

use VideoImporter\DataParser\DataParserJson;

class DataParserJsonTest extends \PHPUnit_Framework_TestCase
{
    public function testParseData()
    {
        $data = '
{
    "videos": [
        {
            "tags": [
                "microwave",
                "cats",
                "peanutbutter"
            ],
            "url": "http://glorf.com/videos/3",
            "title": "science experiment goes wrong"
        }
	]
}				
		';

        $json_parser = new DataParserJson();
        $json_parser->setData($data);

        $return = $json_parser->parse();

        $this->assertEquals(1, count($return));
        $this->assertEquals(
            'science experiment goes wrong',
            $return[0]['title']
        );
    }
}
