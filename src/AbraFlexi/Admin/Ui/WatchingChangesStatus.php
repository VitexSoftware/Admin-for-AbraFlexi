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
 * Description of WatchingChangesStatus.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class WatchingChangesStatus extends \Ease\Html\SpanTag
{
    /**
     * @param bool    $status
     * @param options $properties
     */
    public function __construct($status, $properties = [])
    {
        parent::__construct(new BooleanLabel($status), $properties);
        $this->addItem(new \Ease\TWB5\LinkButton(
            'changesapi.php',
            '🔧',
            'default btn-sm',
            ['title' => _('Chanes API Settings')],
        ));
    }
}
