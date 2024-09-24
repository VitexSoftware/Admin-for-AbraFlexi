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
use AbraFlexi\ui\TWB5\ConnectionForm;
use Ease\TWB5\Container;
use Ease\TWB5\Row;
use Ease\TWB5\WebPage;
use Ease\TWB5\Widgets\Toggle;

\define('EASE_APPNAME', _('Spoje-Admin'));

require_once \dirname(__DIR__).'/vendor/autoload.php';

$oPage = new WebPage(_('AbraFlexi Admin installer'));

if (empty(\Ease\WebPage::getRequestValue('myurl'))) {
    $_REQUEST['myurl'] = \dirname(\Ease\WebPage::phpSelf());
}

$loginForm = new ConnectionForm(['action' => 'install.php']);

$loginForm->addInput(
    new Toggle(
        'browser',
        \array_key_exists('browser', $_REQUEST),
        'automatic',
        ['data-on' => _('AbraFlexi WebView'), 'data-off' => _('System Browser')],
    ),
    _('Open results in AbraFlexi WebView or in System default browser'),
);

// $loginForm->addInput( new \Ease\Html\InputUrlTag('myurl'), _('My Url'), dirname(\Ease\Page::phpSelf()), sprintf( _('Same url as you can see in browser without %s'), basename( __FILE__ ) ) );

$loginForm->fillUp($_REQUEST);

$loginForm->addItem(new \Ease\Html\PTag());

$loginForm->addItem(new \Ease\TWB5\SubmitButton(_('Install Admin\'s Button to AbraFlexi'), 'success btn-lg btn-block'));

$baseUrl = \Ease\WebPage::getRequestValue('myurl').'/index.php?authSessionId=${authSessionId}&companyUrl=${companyUrl}';

$buttonUrl = $baseUrl.'&kod=${object.kod}&id=${object.id}';

if ($oPage->isPosted()) {
    $browser = \array_key_exists('browser', $_REQUEST) ? 'automatic' : 'desktop';

    $buttoner = new \AbraFlexi\RW(
        null,
        array_merge($_REQUEST, ['evidence' => 'custom-button']),
    );

    $buttoner->logBanner();

    if ($buttoner->recordExists('code:Admin')) {
        $buttoner->addStatusMessage(_('The Button with code Admin already exists. Updating'), 'warning');
    }

    $buttoner->insertToAbraFlexi([
        'id' => 'code:USERADMIN',
        'url' => $buttonUrl,
        'title' => _('User Admin'),
        'description' => _('User acount Administration'),
        'location' => 'detail',
        'evidence' => 'uzivatel',
        'browser' => $browser,
    ]);

    $buttoner->addStatusMessage($buttonUrl, 'debug');

    if ($buttoner->lastResponseCode === 201) {
        $buttoner->addStatusMessage(_('Admin Button created'), 'success');
        \define('ABRAFLEXI_COMPANY', $buttoner->getCompany());
    }
} else {
    $oPage->addStatusMessage(_('My App URL').': '.$baseUrl);
}

$setupRow = new Row();
$setupRow->addColumn(2, new \AbraFlexi\Admin\Ui\AppLogo(['class' => 'img-fluid']));
$setupRow->addColumn(6, $loginForm);

$oPage->addItem(new Container(new \Ease\Html\H1Tag(_('Admin for AbraFlexi'))));

$oPage->addItem(new Container($setupRow));

$oPage->addItem(new PageBottom());

echo $oPage;
