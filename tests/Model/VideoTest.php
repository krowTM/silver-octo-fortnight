<?php

namespace Tests\VideoImporter\Model;

use VideoImporter\Model\Video;

class VideoTest extends \PHPUnit_Framework_TestCase
{
    public function testValidation()
    {
        $video = new Video();
        $video->name = 'aaaa';
        $video->tags = 'dddd';
        $this->assertFalse($video->validate());
        $video->url = 'dddd';
        $this->assertTrue($video->validate());
    }
}
