<?php namespace MaheshKS\ContactUs;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
   public function pluginDetails()
    {
        return [
            'name'        => 'Contact Us',
            'description' => 'Contact us custom plugin.',
            'author'      => 'Mahesh K.S.',
            'icon'        => 'icon-leaf'
        ];
    }
    public function registerComponents()
    {
	return [
            '\MaheshKS\ContactUs\Components\ContactUs' => 'contactUs'
        ];
    }

   public function registerSettings()
    {
        return [
            'config' => [
                'label'       => 'Contact Us',
                'icon'        => 'icon-comments-o',
                'description' => 'Manage Settings.',
                'class'       => 'MaheshKS\ContactUs\Models\Settings',
                'order'       => 60
            ]
        ];
    }
}
