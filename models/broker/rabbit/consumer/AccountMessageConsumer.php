<?php

namespace app\models\broker\rabbit\consumer;

use app\models\broker\AmqpConsumer;
use PhpAmqpLib\Connection\AMQPStreamConnection;

/**
 * Class AccountMessageConsumer
 *
 * @package app\models\broker\rabbit
 */
class AccountMessageConsumer extends AmqpConsumer
{
    /**
     * AccountMessageConsumer constructor.
     */
    public function __construct()
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'rabbitmq', 'rabbitmq');

        parent::__construct($connection->channel());
    }

    /**
     * @inheritDoc
     */
    public function configureChannel(): void
    {
        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
        };

        $this->channel->basic_consume('hello', '', false, true, false, false, $callback);
    }
}