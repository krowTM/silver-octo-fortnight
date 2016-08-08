<?php

namespace VideoImporter;

use VideoImporter\Model\Video;

class DataMapper
{
    /**
     * Maps fields from feed to the Video object
     * and normalize values.
     *
     * @param array $data  Array data from feed
     * @param Video $video Video object to map data to
     */
    public static function map($data, Video $video)
    {
        foreach ($data as $field => $value) {
            if (in_array($field, ['labels', 'tags'])) {
                if (is_array($value)) {
                    $video->tags = implode(',', $value);
                } else {
                    $video->tags = str_replace(' ', '', $value);
                }
            } elseif (in_array($field, ['url'])) {
                $video->url = $value;
            } elseif (in_array($field, ['name', 'title'])) {
                $video->name = $value;
            }
        }
    }
}
