<?php namespace MaheshKS\ReportDataBreach\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class ReportBreach extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';


    public $requiredPermissions = [
        'report_breach' 
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('MaheshKS.ReportDataBreach', 'main-menu-item');
    }
}
