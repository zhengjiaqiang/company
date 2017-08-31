<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        // 'css/content.css',
        // 'css/login.css',
        // 'css/public.css',
        // 'css/reset.css',
    ];
    public $js = [
    'assets/149814a7/jquery.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
     public $jsOptions = [
    'position' => \yii\web\View::POS_HEAD
    ];
}
