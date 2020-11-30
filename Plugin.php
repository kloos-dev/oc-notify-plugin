<?php namespace Kloos\Notify;

use Backend;
use System\Classes\PluginBase;

/**
 * Notify Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Notify',
            'description' => 'No description provided yet...',
            'author'      => 'Kloos',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Kloos\Notify\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'kloos.notify.some_permission' => [
                'tab' => 'Notify',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'notify' => [
                'label'       => 'Notify',
                'url'         => Backend::url('kloos/notify/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['kloos.notify.*'],
                'order'       => 500,
            ],
        ];
    }
}
