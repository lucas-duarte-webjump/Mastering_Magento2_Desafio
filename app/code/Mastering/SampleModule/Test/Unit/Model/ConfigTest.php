<?php

namespace Mastering\SampleModule\Test\Unit\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Mastering\SampleModule\Model\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{

    /**
    * @var Config
    */
    private Config $config;
    private $scopeMock;

    protected function setUp(): void
    {
        $this->scopeMock = $this->createMock(ScopeConfigInterface::class);
        $this->config = new Config($this->scopeMock);

        $this->assertInstanceOf(Config::class, $this->config);
    }


    /**
     * @param $status
     * @param $value
     *
     * @dataProvider isEnableProvider
     */
    public function testIsEnabledReturnBool($status, $value) {

        $this->scopeMock->expects($this->once())
        ->method('getValue')
        ->with(Config::XML_PATH_ENABLED)
        ->willReturn($value);

        $this->assertEquals($status, $this->config->isEnabled());
    }

    /**
     * @codeCoverageIgnore
     */
    public function isEnableProvider() {
        return [
            'enabled' => [true, 1],
            'disabled' => [false, 0]
        ];
    }
}
