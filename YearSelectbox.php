<?php
/**
 * @copyright Copyright (c) 2015 ET-Soft
 * @license MIT
 */
namespace etsoft\widgets;

use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * Dropdown renders a Bootstrap dropdown in Yii2 with years.
 *
 * For example,
 *
 * ```php
 * <?php echo $form->field($model, 'year')->widget(etsoft\widgets\YearSelectbox::classname(), [
 *     'yearStart' => 0,
 *     'yearEnd' => -20,
 * ]);
 * ?>
 * ```
 *
 * shows selectbox with values from 2015 to 1995 year.
 *
 * @author Evgeny Titov <etsoft2015@gmail.com>
 * @since 1.0
 */
class YearSelectbox extends InputWidget
{
    /**
     * @var integer value of year. May be positive or negative value.
     * If $yearStartType set 'fix', the list of year started this value.
     * If $yearStartType set 'calculation', the list of year started calculated value from current year.
     */
    public $yearStart;

    /**
     * @var string type of set end year. Available 'fix' or 'calculation' value.
     * If set 'fix', the start year set in this value.
     * If set 'calculation', the start year will be calculation at now year.
     */
    public $yearStartType = 'calculation';

    /**
     * @var integer value of year. May be positive or negative value.
     * If $yearEndType set 'fix', the list of year ended this value.
     * If $yearEndType set 'calculation', the list of year ended calculated value from current year.
     */
    public $yearEnd;

    /**
     * @var string type of set end year. Available 'fix' or 'calculation' value.
     * If set 'fix', the end year set in this value.
     * If set 'calculation', the end year will be calculation at now year.
     */
    public $yearEndType = 'calculation';

    /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'form-control');
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        if ($this->hasModel()) {
            return Html::activeDropDownList($this->model, $this->attribute, $this->_getItems(), $this->options);
        } else {
            return Html::dropDownList($this->name, $this->value, $this->_getItems(), $this->options);
        }
    }

    /**
     * Create array of the years.
     * @return array
     * @throws InvalidConfigException
     */
    private function _getItems()
    {
        $typesAvailable = ['fix', 'calculation'];

        $this->yearStart = intval($this->yearStart);
        $this->yearEnd = intval($this->yearEnd);

        if (!in_array($this->yearStartType, $typesAvailable)) throw new InvalidConfigException("The 'yearStartType' option is must be: 'fix' or 'calculation'.");
        if (!in_array($this->yearEndType, $typesAvailable)) throw new InvalidConfigException("The 'yearEndType' option is must be: 'fix' or 'calculation'.");

        if ($this->yearStartType == 'calculation') $this->yearStart += date('Y');
        if ($this->yearEndType == 'calculation') $this->yearEnd += date('Y');

        $yearsRange = range($this->yearStart, $this->yearEnd);

        return array_combine($yearsRange, $yearsRange);
    }
}