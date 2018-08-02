<?php

namespace hipanel\modules\domain\tests\acceptance\seller;

use hipanel\helpers\Url;
use hipanel\tests\_support\Step\Acceptance\Seller;

class TransferCest
{
    public function ensureIndexPageWorks(Seller $I)
    {
        $I->login();
        $I->needPage(Url::to('/domain/transfer'));
        $I->see('Domain transfer', 'h1');
        $this->ensureICanSeeSingleTransferBox($I);
        $this->ensureICanSeeBulkTransferBox($I);
        $I->see('Transfer', "//button[@type='submit']");
    }

    private function ensureICanSeeSingleTransferBox(Seller $I)
    {
        $I->click(['link' => 'Domain transfer']);
        $I->see('Remove WHOIS protection from the current registrar.');
        $I->see('Domain name', 'label');
        $I->see('Transfer (EPP) password', 'label');
        $I->see('An email was sent to your email address specified in Whois. To start the transfer, click on the link in the email.');
    }

    private function ensureICanSeeBulkTransferBox(Seller $I)
    {
        $I->click(['link' => 'Bulk domain transfer']);
        $I->see('Domains', 'label');
        $I->see('For separation of the domain and code use a space, a comma or a semicolon. Example:', 'p');
        $I->see('yourdomain.com uGt6shlad', 'p');
        $I->see('each pair (domain + code) should be written with a new line', 'p');
    }
}
