<?php
namespace Mastering\SampleModule\Test\Unit\Controller\Adminhtml\Item;

use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Mastering\SampleModule\Controller\Adminhtml\Item\NewAction;
use PHPUnit\Framework\TestCase;

class NewActionTest extends TestCase
{
    private $resultFactoryMock;
    private $resultInterfaceMock;
    private $newAction;
    private $context;

   protected function setUp(): void
   {
        $this->context = $this->createMock(Context::class);
        $this->resultInterfaceMock = $this->getMockForAbstractClass(ResultInterface::class);
        $this->resultFactoryMock = $this->createMock(ResultFactory::class);

        $this->context
        ->expects($this->any())
        ->method('getResultFactory')
        ->willReturn($this->resultFactoryMock);

        $this->newAction = new NewAction($this->context);

        $this->assertInstanceOf(NewAction::class, $this->newAction);
   }

   public function testNewActionReturnPage()
   {

       $this->resultFactoryMock
       ->method('create')
       ->with(ResultFactory::TYPE_PAGE)
       ->willReturn($this->resultInterfaceMock);

       $this->assertEquals($this->resultInterfaceMock, $this->newAction->execute());
   }

}
