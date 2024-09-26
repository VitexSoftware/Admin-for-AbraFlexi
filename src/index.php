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

use AbraFlexi\Admin\Ui\PageBottom;
use AbraFlexi\Admin\Ui\PageTop;
use AbraFlexi\Admin\Ui\WebPage;
use AbraFlexi\Exception;
use Ease\Html\ATag;
use Ease\Html\H1Tag;
use Ease\Html\H2Tag;
use Ease\Html\PreTag;

require './init.php';

$kod = WebPage::getRequestValue('kod');

$oPage->addItem(new PageTop($kod . ' ' . _('Admin')));

if (empty($kod)) {
    $oPage->addStatusMessage(_('Bad call'), 'warning');
    $oPage->addItem(new ATag('install.php', _('Please setup your AbraFlexi connection')));
} else {
    $user = new \AbraFlexi\Uzivatel(\AbraFlexi\Functions::code($kod), ['ignore404' => true]);
    $oPage->container->addItem(new \AbraFlexi\Admin\Ui\UserInfo($user));

    try {
        if ($oPage->isPosted()) {
            //          $invoicer->convertSelected($_REQUEST);
        }
    } catch (Exception $exc) {
        if ($exc->getCode() === 401) {
            $oPage->body->addItem(new H2Tag(_('Session Expired')));
        } else {
            $oPage->addItem(new H1Tag($exc->getMessage()));
            $oPage->addItem(new PreTag($exc->getTraceAsString()));
        }
    }
}

$oPage->addItem(new PageBottom());
echo $oPage;
