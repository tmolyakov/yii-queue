<?php

namespace app\models;

use app\models\broker\rabbit\consumer\AccountMessageConsumer;
use yii\di\Container;

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
            AccountMessageConsumer::class => [
                ['class' => AccountMessageConsumer::class]
            ]
        ]);
    }
}