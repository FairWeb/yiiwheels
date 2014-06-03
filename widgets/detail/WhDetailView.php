<?php
/**
 * WhDetailView widget class
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @copyright Copyright &copy; 2amigos.us 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package YiiWheels.widgets.detail
 * @uses YiiStrap.helpers.BsHtml
 */

Yii::import('bootstrap.helpers.BsHtml');
Yii::import('zii.widgets.CDetailView');

class WhDetailView extends CDetailView
{

    /**
     * @var string|array the table type.
     * Valid values are BsHtml::GRID_STRIPED, BsHtml::GRID_BORDERED and/or BsHtml::GRID_CONDENSED.
     */
    public $type = array(BsHtml::GRID_TYPE_STRIPED, BsHtml::GRID_TYPE_CONDENSED);

    /**
     * @var string the URL of the CSS file used by this detail view.
     * Defaults to false, meaning that no CSS will be included.
     */
    public $cssFile = false;

    /**
     * Initializes the widget.
     */
    public function init()
    {
        parent::init();

        $classes = array('table');

        if (isset($this->type) && !empty($this->type)) {
            if (is_string($this->type)) {
                $this->type = explode(' ', $this->type);
            }

            $validTypes = array(
                BsHtml::GRID_TYPE_BORDERED,
                BsHtml::GRID_TYPE_CONDENSED,
                BsHtml::GRID_TYPE_STRIPED,
                BsHtml::GRID_TYPE_HOVER
            );

            foreach ($this->type as $type) {
                if (in_array($type, $validTypes)) {
                    $classes[] = 'table-' . $type;
                }
            }
        }

        BsHtml::addCssClass(implode(' ', $classes), $this->htmlOptions);
    }
}
