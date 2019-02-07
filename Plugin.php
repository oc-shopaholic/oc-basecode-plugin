<?php namespace Lovata\BaseCode;

use System\Classes\PluginBase;
//Console commands
use Lovata\BaseCode\Classes\Console\ResetAdminPassword;

/**
 * Class Plugin
 *
 * @package Lovata\BaseCode
 * @author  Andrey Kharanenka, a.khoronenko@lovata.com, LOVATA Group
 */
class Plugin extends PluginBase
{
    /**
     * Register plugin components
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Lovata\BaseCode\Components\SiteSettings' => 'SiteSettings',
        ];
    }

    /**
     * Register settings
     * @return array
     */
    public function registerSettings()
    {
        return [
            'config'    => [
                'label'       => 'lovata.basecode::lang.menu.settings',
                'description' => '',
                'icon'        => 'icon-cogs',
                'class'       => 'Lovata\BaseCode\Models\Settings',
                'permissions' => ['lovata-site-settings'],
                'order'       => 100,
            ],
        ];
    }

    /**
     * Plugin boot method
     */
    public function boot()
    {
        $this->addEventListener();
    }

    public function register()
    {
        $this->registerConsoleCommand('basecode:reset_admin_password', ResetAdminPassword::class);
    }

    /**
     * @return array
     */
    public function registerMailTemplates()
    {
        return [];
    }

    /**
     * Add listener
     */
    protected function addEventListener()
    {
        ///
    }
}
