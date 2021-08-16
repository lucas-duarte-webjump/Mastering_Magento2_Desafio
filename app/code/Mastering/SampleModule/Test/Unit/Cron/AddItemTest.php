<?php
namespace Mastering\SampleModule\Test\Unit\Cron;

use Mastering\SampleModule\Console\Command\AddItem;
use Mastering\SampleModule\Model\Config;
use Mastering\SampleModule\Model\ItemFactory;
use PHPUnit\Framework\TestCase;

class AddItemTest extends TestCase
{

    private $config;
    private $itemFactory;

    private $addItem;
   protected function setUp(): void
   {
    $this->itemFactory = $this->createMock(ItemFactory::class);
    $this->config = $this->createMock(Config::class);


    // $this->config
    //  ->method('getValue')
    //  ->with(Config::XML_PATH_ENABLED)
    //  ->willReturn(true);

    $this->addItem = new AddItem($this->itemFactory, $this->config);
   }


   public function testExecuteIsRunningOrNot()
   {

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
