<?php

namespace isavon\grid;

use yii\web\AssetBundle;

/**
 * Base asset bundle.
 *
 * @author Ivan Savon <isavon.we@gmail.com>
 */
class  ActionColumnAsset extends AssetBundle
{
    public $sourcePath = '@isavon/grid/assets';

    public $css = [
        'css/is-grid-actioncolumn.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
