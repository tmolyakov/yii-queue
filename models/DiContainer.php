<?php

namespace app\models;

use app\models\broker\ConsumerInterface;
use app\models\broker\rabbit\consumer\AccountMessageConsumer;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use yii\di\Container;
use yii\di\Instance;

/**
 * Class DiContainer
 *
 * @package app\models
 */
class DiContainer extends Container
{
    /**
     * @inheritDoc
     */
    public function init()
    {
        $this->setSingletons([
            'amqpStreamConnection' => function ($container, $params, $config) {
                return new AMQPStreamConnection(
                    'rabbitmq',
                    5672,
                    'rabbitmq',
                    'rabbitmq',
                    '/',
                );
            },
            AccountMessageConsumer::class => [
                ['class' => AccountMessageConsumer::class],
                [Instance::of('amqpStreamConnection')]
            ]
        ]);

        $this->set(ConsumerInterface::class, AccountMessageConsumer::class);
    }
}