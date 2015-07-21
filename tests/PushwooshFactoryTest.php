<?php

/*
 * This file is part of Laravel Pushwoosh.
 *
 * (c) Schimpanz Solutions AB <info@schimpanz.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Schimpanz\Tests\Pushwoosh;

use Gomoob\Pushwoosh\Client\Pushwoosh;
use Schimpanz\Pushwoosh\PushwooshFactory;

/**
 * This is the Pushwoosh factory test class.
 *
 * @author Vincent Klaiber <vincent@schimpanz.com>
 */
class PushwooshFactoryTest extends AbstractTestCase
{
    public function testMakeStandard()
    {
        $factory = $this->getPushwooshFactory();

        $return = $factory->make([
            'app' => 'your-application-code',
            'token' => 'your-access-token',
        ]);

        $this->assertInstanceOf(Pushwoosh::class, $return);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMakeWithoutToken()
    {
        $factory = $this->getPushwooshFactory();
        $factory->make(['app' => 'your-application-code']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testMakeWithoutSecret()
    {
        $factory = $this->getPushwooshFactory();
        $factory->make(['token' => 'your-access-token']);
    }

    protected function getPushwooshFactory()
    {
        return new PushwooshFactory();
    }
}
