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
 * Description of BooleanLabel.
 *
 * @author Vítězslav Dvořák <info@vitexsoftware.cz>
 */
class BooleanLabel extends \Ease\TWB5\Badge
{
    /**
     * Show boolean Label.
     *
     * @param bool  $bool       state
     * @param array $properties options
     */
    public function __construct($bool, $properties = [])
    {
        parent::__construct(
            $bool ? 'success' : 'default',
            $bool ? _('Yes') : _('No'),
            $properties,
        );
    }
}
