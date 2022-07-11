<?php

namespace isavon\grid;

use Yii;
use yii\helpers\Html;
use yii\grid\ActionColumn as YiiActionColumn;

/**
 * The ActionColumn is a column for the [[GridView]] widget.
 *
 * To add an ActionColumn to the gridview, add it to the [[GridView::columns|columns]] configuration as follows:.
 *
 * ```php
 * 'columns' => [
 *      // ...
 *      [
 *          'class' => 'isavon\grid\ActionColumn',
 *          // you may configure additional properties here
 *      ]
 * ]
 * ```
 *
 * @author Ivan Savon <isavon.we@gmail.com>
 */
class ActionColumn extends YiiActionColumn
{
    /**
     * @var array url of buttons callbacks. The array keys are the button names (without curly brackets),
     * and the values are the corresponding url callbacks. The callbacks should use the following signature:
     *
     * ```php
     * function ($model) {
     *      return [
     *          'images' => Url::to(['image/index', 'postid' => $model->id]),
     *          'update' => Url::to('custom-update-action', 'customId' => $model->id),
     *      ];
     * }
     * ```
     */
    public $urls = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
        $this->registerAssets();

        // hidden button
        $this->buttons['hidden'] = function($url, $model) {
            if ($currentUrl = $this->getCurrentUrl('hidden', $model)) {
                $url = $currentUrl;
            }

            return Html::a(
                '<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM175 208.1L222.1 255.1L175 303C165.7 312.4 165.7 327.6 175 336.1C184.4 346.3 199.6 346.3 208.1 336.1L255.1 289.9L303 336.1C312.4 346.3 327.6 346.3 336.1 336.1C346.3 327.6 346.3 312.4 336.1 303L289.9 255.1L336.1 208.1C346.3 199.6 346.3 184.4 336.1 175C327.6 165.7 312.4 165.7 303 175L255.1 222.1L208.1 175C199.6 165.7 184.4 165.7 175 175C165.7 184.4 165.7 199.6 175 208.1V208.1z"/></svg>',
                $url,
                [
                    'title' => Yii::t('isgrid', 'Hidden'),
                    'aria-label' => Yii::t('isgrid', 'Hidden'),
                    'data-method' => 'post',
                    'class' => 'btn btn-outline-warning btn-sm',
                ]
            );
        };

        // active button
        $this->buttons['active'] = function($url, $model) {
            if ($currentUrl = $this->getCurrentUrl('active', $model)) {
                $url = $currentUrl;
            }

            return Html::a(
                '<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256zM371.8 211.8C382.7 200.9 382.7 183.1 371.8 172.2C360.9 161.3 343.1 161.3 332.2 172.2L224 280.4L179.8 236.2C168.9 225.3 151.1 225.3 140.2 236.2C129.3 247.1 129.3 264.9 140.2 275.8L204.2 339.8C215.1 350.7 232.9 350.7 243.8 339.8L371.8 211.8z"/></svg>',
                $url,
                [
                    'title' => Yii::t('isgrid', 'Activate'),
                    'aria-label' => Yii::t('isgrid', 'Activate'),
                    'data-method' => 'post',
                    'class' => 'btn btn-outline-success btn-sm',
                ]
            );
        };

        // images button
        $this->buttons['images'] = function ($url, $model) {
            if ($currentUrl = $this->getCurrentUrl('images', $model)) {
                $url = $currentUrl;
            }

            return Html::a(
                '<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M447.1 32h-384C28.64 32-.0091 60.65-.0091 96v320c0 35.35 28.65 64 63.1 64h384c35.35 0 64-28.65 64-64V96C511.1 60.65 483.3 32 447.1 32zM111.1 96c26.51 0 48 21.49 48 48S138.5 192 111.1 192s-48-21.49-48-48S85.48 96 111.1 96zM446.1 407.6C443.3 412.8 437.9 416 432 416H82.01c-6.021 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.334-16.68l70-96C142.1 290.4 146.9 288 152 288s9.916 2.441 12.93 6.574l32.46 44.51l93.3-139.1C293.7 194.7 298.7 192 304 192s10.35 2.672 13.31 7.125l128 192C448.6 396 448.9 402.3 446.1 407.6z"/></svg>',
                $url,
                [
                    'title' => Yii::t('isgrid', 'Images'),
                    'aria-label' => Yii::t('isgrid', 'Images'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-outline-warning btn-sm',
                ]
            );
        };

        // update button
        $this->buttons['update'] = function ($url, $model) {
            if ($currentUrl = $this->getCurrentUrl('update', $model)) {
                $url = $currentUrl;
            }

            return Html::a(
                $this->icons['pencil'],
                $url,
                [
                    'title' => Yii::t('yii', 'Update'),
                    'aria-label' => Yii::t('yii', 'Update'),
                    'data-pjax' => '0',
                    'class' => 'btn btn-outline-primary btn-sm',
                ]
            );
        };

        // delete button
        $this->buttons['delete'] = function ($url, $model) {
            if ($currentUrl = $this->getCurrentUrl('delete', $model)) {
                $url = $currentUrl;
            }

            return Html::a(
                $this->icons['trash'],
                $url,
                [
                    'title' => Yii::t('yii', 'Delete'),
                    'aria-label' => Yii::t('yii', 'Delete'),
                    'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'data-method' => 'post',
                    'data-pjax' => '0',
                    'class' => 'btn btn-outline-danger btn-sm',
                ]
            );
        };
    }

    /**
     * Registration of translations
     */
    protected function registerTranslations()
    {
        Yii::$app->i18n->translations['isgrid*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => __DIR__ . '/messages',
        ];
    }

    /**
     * Registration of assets files
     */
    protected function registerAssets()
    {
        ActionColumnAsset::register(Yii::$app->view);
    }

    /**
     * @param string $type the button name
     * @param yii\db\ActiveRecordInterface $model the data model
     * @return false|string the url
     */
    private function getCurrentUrl($type, $model)
    {
        if (!$this->urls) {
            return false;
        }

        $urls = call_user_func($this->urls, $model);
        if (!isset($urls[$type])) {
            return false;
        }

        return $urls[$type];
    }
}
