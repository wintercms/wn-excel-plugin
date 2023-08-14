<?php

namespace Winter\Excel;

use Illuminate\Foundation\AliasLoader;
use System\Classes\PluginBase;

/**
 * Excel Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'winter.excel::lang.plugin.name',
            'description' => 'winter.excel::lang.plugin.description',
            'author'      => 'Winter',
            'icon'        => 'icon-leaf',
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register(): void
    {
        $this->registerMaatwebsiteExcel();
    }

    /**
     * Register the maatwebsite/excel package
     */
    protected function registerMaatwebsiteExcel(): void
    {
        AliasLoader::getInstance()->alias('Excel', \Maatwebsite\Excel\Facades\Excel::class);
        $this->app->register(\Maatwebsite\Excel\ExcelServiceProvider::class);
        $this->app['config']->set('excel', $this->app['config']->get('winter.excel::excel'));
    }
}
