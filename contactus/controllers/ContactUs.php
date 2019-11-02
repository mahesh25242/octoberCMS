<?php namespace MaheshKS\ContactUs\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class ContactUs extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController'   ];
    
    public $listConfig = 'config_list.yaml';


    public $requiredPermissions = [
        'contactUs' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('MaheshKS.ContactUs', 'main-menu-item');
    }
}
