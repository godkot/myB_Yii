<?php

$configFile = 'backend.php';

$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/' . $configFile;

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);

class Yii extends YiiBase
{
    // тут можно добавить свои любимые методы, я например добавляю сюда вызов ошибки 404
    /**
     * @throws CHttpException
     */
    public static function error_404()
    {
        throw new CHttpException(404, Yii::t('error', 'Страница не найдена.'));
    }
}

Yii::createWebApplication($config)->run();