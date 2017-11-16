<?php

namespace geoffry304\quicklinks;

/**
 * Description of QuicklinkAsset
 *
 * @author G.Vandeneede
 */
class QuicklinkAsset extends \yii\web\AssetBundle {

    // the alias to your assets folder in your file system 
    public $sourcePath = '@vendor/geoffry304/yii2-quicklinks/assets';
    // finally your files..  
    public $css = [
        '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
    ];
    public $js = [
    ];
    // that are the dependecies, for makeing your Asset bundle work with Yii2 framework 
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
