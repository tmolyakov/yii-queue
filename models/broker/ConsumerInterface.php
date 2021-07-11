<?php

namespace app\models\broker;

/**
 * Interface ConsumerInterface
 *
 * @package app\models\broker\consumer
 */
interface ConsumerInterface
{
    /**
     * Start listen to messages
     */
    public function listen(): void;
}