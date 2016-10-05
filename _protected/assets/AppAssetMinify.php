<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;
use Yii;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Santhika <santhika@gmail.com>
 * 
 * @since 2.0
 */
class AppAssetMinify extends AssetBundle
{
    public $basePath = '@webroot';
    //public $baseUrl = '@themes';

    /**
     * @inherit
     */
    public $sourcePath = '@bower/';

    /**
     * @inherit
     */
    public $css = [ 
        'ionicons/css/ionicons.min.css',
        'admin-lte/dist/css/AdminLTE.min.css',
        'admin-lte/dist/css/skins/_all-skins.min.css'
    ];
    
    /**
     * @inherit
     */
    public $js = [
        'admin-lte/dist/js/app.min.js',
        'ajax-modal-popup.js'
    ];
    
    /**
     * @inherit
     */
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'cinghie\fontawesome\FontAwesomeMinifyAsset',
    ];
}
