<?php namespace Bostick\Stocker;

/**
 * The plugin.php file (called the plugin initialization script) defines the plugin information class.
 */

use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    public function pluginDetails()
    {
        return [
            'name'        => 'Stocker',
            'description' => 'Provides stock quote information.',
            'author'      => 'Bill Bostick',
            'icon'        => 'icon-sun-o'
        ];
    }

    public function registerComponents()
    {
        return [
           '\Bostick\Stocker\Components\Stocker' => 'stocker',
        ];
    }
}
