<?php
namespace Mastering\SampleModule\Test\Unit\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Mastering\SampleModule\Model\ConfigLog;
use PHPUnit\Framework\TestCase;

class ConfigLogTest extends TestCase
{

    /**
    * @var Config
    */
    private ConfigLog $config;
    private $scopeMock;

    protected function setUp(): void
    {
        $this->scopeMock = $this->createMock(ScopeConfigInterface::class);
        $this->config = new ConfigLog($this->scopeMock);

        $this->assertInstanceOf(ConfigLog::class, $this->config);
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
        ->with(ConfigLog::XML_PATH_ENABLED)
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
