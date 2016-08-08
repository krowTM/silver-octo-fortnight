<?php

namespace Tests\VideoImporter;

use VideoImporter\Model\Video;
use VideoImporter\DataMapper;

class DataMapperTest extends \PHPUnit_Framework_TestCase
{
    public function testMapping()
    {
        $video = new Video();
        $data = [
            'labels' => 'tag1, tag2',
            'url' => 'test_url',
            'title' => 'test title',
        ];
        DataMapper::map($data, $video);

        $this->assertEquals('tag1,tag2', $video->tags);
        $this->assertEquals('test_url', $video->url);
        $this->assertEquals('test title', $video->name);
    }
}
