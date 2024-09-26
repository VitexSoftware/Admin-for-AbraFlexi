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

namespace AbraFlexi\Admin;

require './init.php';

$oPage->onlyForLogged();

$oPage->addItem(new Ui\PageTop(_('Companies')));

$cListing = $oPage->container->addItem(new Ui\CompaniesListing());

// $oPage->setRequestURL($cListing->companer->curlInfo['url']);

$oPage->addItem(new Ui\PageBottom());

$oPage->draw();
