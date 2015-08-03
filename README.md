# yii2-widget-select-year

[![Latest Stable Version](https://poser.pugx.org/et-soft/yii2-widget-select-year/v/stable)](https://packagist.org/packages/et-soft/yii2-widget-select-year)
[![License](https://poser.pugx.org/et-soft/yii2-widget-select-year/license)](https://packagist.org/packages/et-soft/yii2-widget-select-year)
[![Total Downloads](https://poser.pugx.org/et-soft/yii2-widget-select-year/downloads)](https://packagist.org/packages/et-soft/yii2-widget-select-year)
[![Monthly Downloads](https://poser.pugx.org/et-soft/yii2-widget-select-year/d/monthly)](https://packagist.org/packages/et-soft/yii2-widget-select-year)
[![Daily Downloads](https://poser.pugx.org/et-soft/yii2-widget-select-year/d/daily)](https://packagist.org/packages/et-soft/yii2-widget-select-year)

Widget for Yii2, created selectbox field with years.

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

### Examples


Show selectbox with values from 2015 (current year) to 1995 year (-20 years from current year):

```php
<?php echo $form->field($model, 'year')->widget(etsoft\widgets\YearSelectbox::classname(), [
    'yearStart' => 0,
    'yearEnd' => -20,
 ]);
?>
```

Show selectbox with values from 2005 (current year - 10 years) to 2025 year (+ 10 years from current year):

```php
<?php echo $form->field($model, 'year')->widget(etsoft\widgets\YearSelectbox::classname(), [
    'yearStart' => -10,
    'yearEnd' => 10,
 ]);
?>
```

Show selectbox with fix values from 2000 to 2010 years:

```php
<?php echo $form->field($model, 'year')->widget(etsoft\widgets\YearSelectbox::classname(), [
    'yearStart' => 2000,
    'yearStartType' => 'fix',
    'yearEnd' => 2010,
    'yearEndType' => 'fix',
 ]);
?>
```