<?php

namespace app\commands\broker;

use app\models\broker\rabbit\consumer\AccountMessageConsumer;
use Exception;
use Yii;
use yii\console\Controller;

/**
 * Class ConsumerController
 *
 * @package app\commands\broker
 */
class ConsumerController extends Controller
{
    /**
     * @param AccountMessageConsumer $consumer
     */
    public function actionListenAccountMessage(AccountMessageConsumer $consumer)
    {
        try {
            $consumer->listen();
        } catch (Exception $exception) {
            Yii::error($exception->getMessage());
            $this->stderr($exception->getMessage());
        }
    }
}