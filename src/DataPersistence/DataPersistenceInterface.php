<?php

namespace VideoImporter\DataPersistence;

use VideoImporter\Logger\LoggerInterface;
use VideoImporter\Model\Video;

interface DataPersistenceInterface
{
    /**
     * Sets logger.
     *
     * @param LoggerInterface $logger Logger object to use for logging
     *
     * @return object
     */
    public function setLogger(LoggerInterface $logger);

    /**
     * Saves a video.
     *
     * @param Video $video Video object to save
     *
     * @return bool
     */
    public function save(Video $video);
}
