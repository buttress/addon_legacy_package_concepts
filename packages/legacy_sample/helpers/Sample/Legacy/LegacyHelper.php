<?php
namespace Concrete\Package\LegacySample\Helpers\Sample\Legacy;

/**
 * Class LegacyHelper
 * A sample concrete5 v6 "helper"-esque class
 *
 * @package Concrete\Package\LegacySample\Libraries
 */
class LegacyHelper
{

    /**
     * Used to determine legacy status.
     *
     * @var bool
     */
    protected $legacy = true;

    /**
     * Is this a legacy helper?
     *
     * @return bool
     */
    public function isLegacy()
    {
        return !!$this->legacy;
    }

}
