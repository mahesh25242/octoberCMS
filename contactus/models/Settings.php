<?php

namespace MaheshKS\ContactUs\Models;

use Model;
use Cms\Classes\Theme;
use Cms\Classes\Page;

/**
 * Class Settings
 * @package MaheshKS\ContactUs\Models
 */
class Settings extends Model
{

    /**
     * @var array
     */
    public $implement = ['System.Behaviors.SettingsModel'];

    // A unique code
    /**
     * @var string
     */
    public $settingsCode = 'maheshks_contactus_settings';

    // Reference to field configuration
    /**
     * @var string
     */
    public $settingsFields = 'fields.yaml';

    /**
     * @param null $keyValue
     * @return array
     */
    public function getStatusOptions($keyValue = null)
    {
        return Comments::STATUS;
    }

}