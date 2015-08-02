# yii2-widget-select-year

Widget for Yii2, created selectbox field with years.

For example,

```php
<?php echo $form->field($model, 'year')->widget(app\components\YearSelectbox::classname(), [
    'yearStart' => 0,
    'yearEnd' => -20,
 ]);
?>
```

shows selectbox with values from 2015 (current year) to 1995 year.

### Install

Either run

```
$ php composer.phar require et-soft/yii2-widget-select-year "*"
```

or add

```
"et-soft/yii2-widget-select-year": "*"
```

to the ```require``` section of your `composer.json` file.
