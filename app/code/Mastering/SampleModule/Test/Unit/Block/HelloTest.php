<?php
namespace Mastering\SampleModule\Test\Unit\Block;

use Magento\Framework\Event\ManagerInterface;
use Mastering\SampleModule\Block\Hello;
use Mastering\SampleModule\Model\ConfigLog;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;
use PHPUnit\Framework\TestCase;
use Magento\Framework\View\Element\Template\Context;
use Mastering\SampleModule\Model\ResourceModel\Item\Grid\Collection;

class HelloTest extends TestCase
{

    private Hello $hello;
    private $collectionFactoryMock;
    private $collectionMock;
    private $config;
    private $context;
    private $eventMenagerMock;

    protected function setUp(): void
    {

        $this->collectionFactoryMock = $this->createMock(CollectionFactory::class);
        $this->config = $this->createMock(ConfigLog::class);
        $this->eventMenagerMock = $this->createMock(ManagerInterface::class);
        $this->context = $this->createMock(Context::class);
        $this->collectionMock = $this->createMock(Collection::class);

        $this->hello = new Hello(
            $this->context,
            $this->collectionFactoryMock,
            [],
            $this->eventMenagerMock,
            $this->config
        );

    }


    /**
     * @dataProvider isEnableProvider
     */
    public function testIfDispatcIsActive(?bool $isEnabled, int $exactly)
    {
        $this->config->expects($this->once())
        ->method('isEnabled')
        ->willReturn($isEnabled);


        $this->eventMenagerMock->expects($this->exactly($exactly))
        ->method('dispatch')
        ->with('inside_table_page');

        $this->collectionFactoryMock
        ->expects($this->once())
        ->method('create')
        ->willReturn($this->collectionMock);

        $this->collectionMock
        ->method('getItems')
        ->willReturn([0, 1, 2, 3, 4]);


        $result = $this->hello->getItems();

        $this->assertCount(5, $result);
    }

    /**
     * @codeCoverageIgnore
     */
    public function isEnableProvider() {
        return [
            'enabled' => [
                'isEnabled' => true,
                'exactly' => 1
            ],
            'disabled' => [
                'isEnabled' => null,
                'exactly' =>0
            ]
        ];
    }
}
