<?php

declare(strict_types=1);

/**
 * This file is part of the Admin-for-AbraFlexi package
 *
 * https://github.com/VitexSoftware/Admin-for-AbraFlexi
 *
 * (c) Vítězslav Dvořák <http://vitexsoftware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AbraFlexi\Admin\Ui;

/**
 * Description of CopyToClipBoard.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class CopyToClipBoard extends \Ease\Container
{
    public function __construct($initialContent = null)
    {
        parent::__construct($initialContent);
        $this->addItem(new \Ease\Html\ButtonTag(
            '🖇️',
            ['class' => 'btn copy', 'data-clipboard-target' => '#'.$initialContent->getTagID()],
        ));
        WebPage::singleton()->includeJavaScript('js/clipboard.js');
        WebPage::singleton()->addJavaScript('var clipboard = new Clipboard(\'.copy\');');
    }
}
