<h1 align="center">
    yii2-grid
    <hr />
</h1>

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
$ php composer.phar require isavon/yii2-grid "@dev"
```

or add

```
"isavon/yii2-grid": "@dev"
```

to the ```require``` section of your `composer.json` file.

## Changes

> NOTE: Refer the [CHANGE LOG](https://github.com/isavon/yii2-grid/blob/master/CHANGE.md) for details on changes to various releases.

## Usage

Add ActionColumn to view file.

```php
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'summary' => false,
    'columns' => [
        'id',
        'name',
        'url',
        [
            'class' => 'isavon\grid\ActionColumn',
            'template' => '{active} {hidden} {images} {update} {delete}',
            'urls' => function($model) {
                return [
                    'images' => Url::to(['work-image/index', 'workid' => $model->id]),
                ];
            },
            'contentOptions' => ['class' => 'text-center'],
            'header' => 'Actions',
        ]
    ]
]) ?>
```