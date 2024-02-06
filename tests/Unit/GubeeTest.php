<?php

declare(strict_types=1);

namespace Gubee\SDK\Test\Unit;

use Gubee\SDK\Gubee;
use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\AddHostPlugin;
use PHPUnit\Framework\TestCase;

class GubeeTest extends TestCase
{
    public function testConstructorWithDefaultParams()
    {
        $gubee = new Gubee();
        $this->assertInstanceOf(Gubee::class, $gubee);
    }

    public function testSetBaseUrl()
    {
        $gubee  = new Gubee();
        $result = $gubee->setBaseUrl('https://custom.api.gubee.com');
        $this->assertInstanceOf(Gubee::class, $result);
        $hasHostPlugin = false;
        foreach ($gubee->getClientBuilder()->getPlugins() as $plugin) {
            if ($plugin instanceof AddHostPlugin) {
                $hasHostPlugin = true;
                break;
            }
        }

        $this->assertTrue($hasHostPlugin);
    }

    public function testGetHttpClient()
    {
        $gubee      = new Gubee();
        $httpClient = $gubee->getHttpClient();
        $this->assertInstanceOf(HttpMethodsClientInterface::class, $httpClient);
    }
}
