<?php namespace MaheshKS\DataBreachStatistics;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'Data Breach Statistics',
            'description' => 'Data Breach Statistics custom plugin.',
            'author'      => 'Mahesh K.S.',
            'icon'        => 'icon-leaf'
        ];
    }
    public function registerComponents()
    {
	return [
            '\MaheshKS\DataBreachStatistics\Components\BreachStatistics' => 'breachStatistics'
        ];
    }

    public function registerSettings()
    {
        return [
            'config' => [
                'label'       => 'Data Breach Statistics',
                'icon'        => 'icon-comments-o',
                'description' => 'Manage Settings.',
                'class'       => 'MaheshKS\DataBreachStatistics\Models\Settings',
                'order'       => 60
            ]
        ];
    }
}
