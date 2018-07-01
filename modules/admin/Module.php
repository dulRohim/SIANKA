<?php

namespace app\modules\admin;

use Yii;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */

    public $layout = '/admin';
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        Yii::$app->set('user', [
            'class' => 'yii\web\User',
            'identityClass' => 'appmodels\User',
            'enableAutoLogin' => false,
            'loginUrl' => ['admin/default/login'],
        ]);

        Yii::$app->set('session', [
            'class' => 'yii\web\Session',
            'name' => '_adminSessionId',
        ]);
    }
}
