<?php

namespace app\models\broker;

use ErrorException;
use PhpAmqpLib\Channel\AMQPChannel;

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
     * @param AMQPChannel $channel
     */
    public function __construct(AMQPChannel $channel)
    {
        $this->channel = $channel;
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