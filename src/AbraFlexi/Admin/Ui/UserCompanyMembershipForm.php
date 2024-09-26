<?php

/**
 * This file is part of the vitexsoftware_Admin-for-abraflexi package
 *
 * https://github.com/VitexSoftware/
 *
 * (c) Vítězslav Dvořák <http://vitexsoftware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AbraFlexi\Admin\Ui;

/**
 * Description of UserCompanyMembershipForm
 *
 * @author Vitex <info@vitexsoftware.cz> 
 */
class UserCompanyMembershipForm extends \Ease\TWB5\Form {

    private \AbraFlexi\Company $companer;

    #[\Override]
    public function __construct($user, $formDivProperties = [], $formContents = null) {
        $this->companer = new \AbraFlexi\Company(null, ['company' => null]);
        $companies = $this->getListing();

        $listing = new \Ease\Html\DivTag();
        $userHelper = new \AbraFlexi\Uzivatel();
        foreach ($companies as $companyCode => $companyData) {
            $userHelper->setCompany($companyCode);
            $companyUsers = $userHelper->getFlexiData();

            $companyInfo = new \Ease\Html\DivTag(new \Ease\Html\H3Tag($companyCode));

            foreach ($companyUsers as $userInfo) {
                $companyInfo->addItem( new \Ease\Html\ATag('?kod='.$userInfo['kod'], new \Ease\TWB5\Badge($userInfo['kod'], $user->getDataValue('kod') == $userInfo['kod'] ? 'success' : 'primary') ) );
            }

            $listing->addItem($companyInfo);
        }

        parent::__construct([], $formDivProperties, $listing);
    }

    public function getListing() {
        $companies = [];
        $companiesRaw = $this->companer->getFlexiData();

        if (\count($companiesRaw)) {
            $companies = \Ease\Functions::reindexArrayBy($companiesRaw, 'dbNazev');
        }

        return $companies;
    }
}
