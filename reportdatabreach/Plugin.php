<?php namespace MaheshKS\ReportDataBreach;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
	public function pluginDetails()
    {
        return [
            'name'        => 'Report Breach',
            'description' => 'Report Breach custom plugin.',
            'author'      => 'Mahesh K.S.',
            'icon'        => 'icon-leaf'
        ];
    }
	
    public function registerComponents()
    {
		return [
            '\MaheshKS\ReportDataBreach\Components\ReportBreach' => 'reportBreach'
        ];
    }

    public function registerSettings()
    {
        return [
            'config' => [
                'label'       => 'Report Breach Form',
                'icon'        => 'icon-comments-o',
                'description' => 'Manage Settings.',
                'class'       => 'MaheshKS\ReportDataBreach\Models\Settings',
                'order'       => 60
            ]
        ];
    }
}
