<?php

namespace VideoImporter\Logger;

interface LoggerInterface
{
    /**
     * Logs message.
     *
     * @param string|array $msg The message to log
     */
    public function log($msg);
}
