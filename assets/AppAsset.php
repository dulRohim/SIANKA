<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.min.css',
        // 'css/jquery.dataTables.min.css',
        // 'css/dataTables.bootstrap.min.css',
        // 'css/footable.bootstrap.css',
        // 'css/footable.bootstrap.min.css',
    ];
    public $js = [
        'js/main.js',
        // 'js/jquery.dataTables.min.js',
        // 'js/jquery-3.3.1.js',
        // 'js/dataTables.bootstrap.min.js',
        // 'js/footable.js',
        // 'js/footable.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
