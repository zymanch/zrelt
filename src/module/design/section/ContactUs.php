<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 15:13
 */
namespace module\design\section;

class ContactUs extends \module\design\Section {

    public $title;
    public $email;
    public $phone;
    public $address;
    public $skype;

    public $title_subscribe;
    public $content_subscribe;
    public $action_subscribe;

    public function getSupportedLayouts()
    {
        return [self::LAYOUT_CLICK_MENU,self::LAYOUT_MEGA_MENU,self::LAYOUT_DEFAULT_MENU,self::LAYOUT_RIGHT_MENU];
    }

    public function getViewFileName()
    {
        return 'section/contact_us';
    }



}