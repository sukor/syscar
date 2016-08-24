<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAssetgen extends AssetBundle
{
    public $sourcePath = '@app/themes/gentelella';
 
    public $css = [
        'font-awesome/css/font-awesome.min.css',
        'css/nprogress.css',
        'css/jquery.mCustomScrollbar.min.css',
        'css/custom.min.css',
        'css/fileinput.min.css'

    ];

    public $js = [
    'js/fastclick.js',
	'js/nprogress.js',
	'js/jquery.mCustomScrollbar.concat.min.js',
	'js/custom.min.js',
	'js/fileinput.min.js'
    ];


    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}
