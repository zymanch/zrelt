<?php
namespace controllers;


class HelpController extends \components\Controller
{

    public $layout = self::LAYOUT_DEFAULT_MENU;

    const HELP_CHOOSE_ALIAS = 'vibor-kvartiri';
    const HELP_CHECK_ALIAS = 'kak-proverit-kvartiru-pered-pokupkoi';
    const HELP_DOCS_CHECK_ALIAS = 'kakie-dokumenti-proviryat';
    const HELP_SELLER_ALIAS = 'o-pravomochiyah-prodavca';
    const HELP_PEOPLE_ALIAS = 'o-propisannih-licah';
    const HELP_DISPUTE_ALIAS = 'o-pritazaniyah-i-sudebnih-sporah';
    const HELP_ENCUMBRANCE_ALIAS = 'ob-obremeneniyah-i-arestah';
    const HELP_DEBT_ALIAS = 'proverit-dolgi-po-komunalnim-platejam';
    const HELP_REDEVELOPMENT_ALIAS = 'proveritaem-zakonnost-pereplanirovki';
    const HELP_SALE_ALIAS = 'kak-pravilno-oformit-pokupku-kvartiry';
    const HELP_CONTRACT_ALIAS = 'zakluchenie-predvaritelnogo-dogovora-avanc-zadatok';
    const HELP_DEPOSIT_ALIAS = 'chto-nujno-znat-o-zadatke';
    const HELP_DOCS_ALIAS = 'sostavlenie-dokumentov-dla-registracii';

    public function actions()
    {
        $pages = [
            self::HELP_CHOOSE_ALIAS => 'choose',
            self::HELP_CHECK_ALIAS => 'check',
            self::HELP_DOCS_CHECK_ALIAS => 'docsCheck',
            self::HELP_SELLER_ALIAS => 'seller',
            self::HELP_PEOPLE_ALIAS => 'people',
            self::HELP_DISPUTE_ALIAS => 'dispute',
            self::HELP_ENCUMBRANCE_ALIAS => 'encumbrance',
            self::HELP_DEBT_ALIAS => 'debt',
            self::HELP_REDEVELOPMENT_ALIAS => 'redevelopment',
            self::HELP_SALE_ALIAS => 'sale',
            self::HELP_CONTRACT_ALIAS => 'contract',
            self::HELP_DEPOSIT_ALIAS => 'deposit',
            self::HELP_DOCS_ALIAS => 'docs',
        ];
        $result = [];
        foreach ($pages as $alias => $view) {
            $result[$alias]=array(
                'class'=>\yii\web\ViewAction::class,
                'viewPrefix' => null,
                'defaultView' => $view
            );
        }
        return $result;
    }

}
