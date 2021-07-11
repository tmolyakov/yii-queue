<?php

namespace app\models\broker;

use ErrorException;
use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Connection\AMQPStreamConnection;

/**
 * Class AmqpConsumer
 *
 * @package app\models\broker\rabbit
 */
abstract class AmqpConsumer implements ConsumerInterface
{
    /** @var AMQPChannel  */
    protected AMQPChannel $channel;

    /**
     * Consumer constructor.
     *
     * @param AMQPStreamConnection $connection
     */
    public function __construct(AMQPStreamConnection $connection)
    {
        $this->channel = $connection->channel();
    }

    /**
     * @inheritDoc
     *
     * @throws ErrorException
     */
    public function listen(): void
    {
        $this->configureChannel();

        while ($this->channel->is_open()) {
            $this->channel->wait();
        }
    }

    /**
     * Configures channel for queue
     *
     * @return void
     */
    abstract public function configureChannel(): void;
}