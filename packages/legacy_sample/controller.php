<?php
namespace Concrete\Package\LegacySample;

use Concrete\Core\Foundation\Service\ProviderList;
use Symfony\Component\ClassLoader\Psr4ClassLoader;

/**
 * Class Controller
 * This is a sample controller that adds legacy concepts like models helpers and libraries.
 *
 * @package Concrete\Package\LegacySample
 */
class Controller extends \Package
{

    protected $pkgHandle = 'legacy_sample';
    protected $appVersionRequired = '5.7.0.4';
    protected $pkgVersion = '1.0';

    public function getPackageDescription()
    {
        return t("Sample package that includes legacy concepts");
    }

    public function getPackageName()
    {
        return t("Legacy Sample");
    }

    public function install()
    {
        parent::install();

        // Make sure we load everything.
        $this->on_start();
    }

    public function on_start()
    {
        // Set up our namespaces
        $this->autoload();

        // Register our service provider
        $list = new ProviderList(\Core::getFacadeRoot());
        $list->registerProvider('Concrete\\Package\\LegacySample\\Libraries\\ServiceProvider');

        // Make sure that the legacy helper is working
        $legacy_helper = \Core::make('helpers/legacy');
        if ($legacy_helper->isLegacy()) {
            die('Everything is autoloading as expected!');
        }
    }

    /**
     * Autoload all the things!
     */
    public function autoload()
    {
        $namespace = '\\Concrete\\Package\\LegacySample';

        // Register legacy namespaces with a PSR4 autoloader
        $loader = new Psr4ClassLoader();
        $loader->addPrefix("{$namespace}\\Models", __DIR__ . '/models');
        $loader->addPrefix("{$namespace}\\Helpers", __DIR__ . '/helpers');
        $loader->addPrefix("{$namespace}\\Libraries", __DIR__ . '/libraries');

        $loader->register();
    }

}
