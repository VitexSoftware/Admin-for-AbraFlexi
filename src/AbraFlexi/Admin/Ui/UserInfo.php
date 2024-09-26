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
 * Description of UserInfo.
 *
 * @author vitex
 */
class UserInfo extends \Ease\Html\DivTag
{
    public function __construct($user = null, $properties = [])
    {
        $userRow = new \Ease\TWB5\Row();
        
        $userTable = new \Ease\TWB5\Table();
        $userCompanys = new UserCompanyMembershipForm($user);
        
        $userRow->addColumn(6, $userCompanys);
        
        foreach ($user->getData() as $property => $value) {
            $userTable->addRowColumns(['p' => (string) $property, 'v' => (string) $value]);
        }

        $userRow->addColumn(6, $userTable);
        parent::__construct($userRow, $properties);
    }
}
