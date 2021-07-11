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
     * @inheritDoc
     */
    public function configureChannel(): void
    {
        $this->channel->queue_declare('hello', false, false, false, false);
        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) {
            echo ' [x] Received ', $msg->body, "\n";
        };

        $this->channel->basic_consume('hello', '', false, true, false, false, $callback);
    }
}