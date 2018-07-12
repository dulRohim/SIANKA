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
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'admin/css/skins/_all-skins.css',
        'admin/css/master_style.css',
        // 'admin/css/bootstrap/dist/css/bootstrap.css',
        // 'admin/css/Ionicons/css/ionicons.css',
        // 'admin/css/morris.js/morris.css',
        // 'admin/css/bootstrap-datepicker/dist/css/bootstrap-datepicker.css',
        // 'admin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.css',
    ];
    public $js = [
         'admin/js/main.js',
         // 'admin/js/dashboard.js',
         'admin/js/template.js',
         'admin/js/demo.js',
         'admin/js/fastclick/lib/fastclick.js',
         'admin/js/jquery-slimscroll/jquery.slimscroll.min.js',
         // 'admin/js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js',
         // 'admin/js/jquery/dist/jquery.js',
         // 'admin/js/jquery-ui/jquery-ui.js',
         // 'admin/js/raphael/raphael.js',
         // 'admin/js/morris.js/morris.js',
         // 'admin/js/bootstrap-datepicker/dist/js/bootstrap-datepicker.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'rmrevin\yii\ionicon\AssetBundle',
        'rmrevin\yii\fontawesome\AssetBundle',
    ];
}
