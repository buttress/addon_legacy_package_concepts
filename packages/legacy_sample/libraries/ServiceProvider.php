<?php
namespace Concrete\Package\LegacySample\Libraries;

use Concrete\Core\Foundation\Service\Provider;

/**
 * Class ServiceProvider
 * This class provides registration for anything and everything that happens on load past autoload.
 *
 * @package Buttress\Sample
 */
class ServiceProvider extends Provider
{

    public function register()
    {
        \Core::bind('helpers/legacy', 'Concrete\\Package\\LegacySample\\Helpers\\Sample\\Legacy\\LegacyHelper');
    }

}
