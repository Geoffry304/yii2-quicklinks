# yii2 Quicklinks

[![Latest Version](https://img.shields.io/github/tag/geoffry304/yii2-quicklinks.svg?style=flat-square&label=release)](https://github.com/geoffry304/yii2-quicklinks/tags)
[![Software License](https://img.shields.io/badge/license-BSD-brightgreen.svg?style=flat-square)](https://github.com/geoffry304/yii2-quicklinks/blob/master/LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/geoffry304/yii2-quicklinks.svg?style=flat-square)](https://packagist.org/packages/geoffry304/yii2-quicklinks)

#### Extension to generate quicklinks for a user in the topbar ####

## Installation ##

The preferred way to install **Quicklinks** is through [Composer](https://getcomposer.org/). Either add the following to the require section of your `composer.json` file:

`"geoffry304/yii2-quicklinks": "*"` 

Or run:

`$ php composer.phar require geoffry304/yii2-quicklinksr "*"` 

You can manually install **Quicklinks** by [downloading the source in ZIP-format](https://github.com/geoffry304/yii2-quicklinks/archive/master.zip).

Run the migration file
  ```php yii migrate --migrationPath=@vendor/geoffry304/yii2-quicklinks/migrations```

Update the config file
```php
// app/config/web.php
return [
    'modules' => [
                'quicklinks' => [
            'class' => 'geoffry304\quicklinks\Module',
        ],
    ],
];
```

## Using QuicklinksWidget ##

**QuicklinksWidget** is a Yii 2.0 [Widget](http://www.yiiframework.com/doc-2.0/yii-base-widget.html).

**QuicklinksWidget** is in namespace `geoffry304\quicklinks`.

For instance, to show **QuicklinksWidget** in a view, use code like this:

    use geoffry304\quicklinks\QuicklinkWidget;
        
	...
	<?= QuicklinkWidget::widget();?>
	...
  
  #### options ####
  
  **QuicklinksWidget** runs 'out of the box'. It has the following options to modify it's behaviour:

  - **sort**: value can be `true` or `false`. Sort based on the position attribute.
  - **totalWithTitle**: For example if set to `3` then only the title will be shown when the total of links is lower then 3.
