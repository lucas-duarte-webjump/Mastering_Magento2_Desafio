<?php
namespace Mastering\SampleModule\Test\Unit\Controller\Adminhtml\Item;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Mastering\SampleModule\Controller\Adminhtml\Item\Save;
use Mastering\SampleModule\Model\Item;
use Mastering\SampleModule\Model\ItemFactory;
use PHPUnit\Framework\TestCase;

class SaveTest extends TestCase
{

    private $contextMock;
    private $itemFactoryMock;
    private $itemMock;
    private $_request;
    private $resultRedirectFactoryMock;
    private $redirectMock;

    private $save;

    protected function setUp(): void
    {

        $this->contextMock = $this->createMock(Context::class);

        $this->itemFactoryMock = $this->createMock(ItemFactory::class);
        $this->itemMock = $this->getMockBuilder(Item::class)
        ->disableOriginalConstructor()
        ->setMethods(['save', 'setData'])
        ->getMock();

        $this->_request = $this->getMockBuilder(RequestInterface::class)
        ->disableOriginalConstructor()
        ->setMethods(['getPostValue'])
        ->getMockForAbstractClass();


        $this->resultRedirectFactoryMock = $this->createMock(RedirectFactory::class);
        $this->redirectMock = $this->createMock(Redirect::class);

        $this->contextMock->method('getRequest')->willReturn($this->_request);
        $this->contextMock->method('getResultRedirectFactory')
        ->willReturn($this->resultRedirectFactoryMock);

        $this->save = new Save($this->contextMock, $this->itemFactoryMock);
    }

    public function testExecute()
    {
        $this->itemFactoryMock
         ->method('create')
         ->willReturn($this->itemMock);

       $this->_request->expects($this->once())
        ->method('getPostValue')
        ->willReturn(['general' => 'test']);

        $this->resultRedirectFactoryMock->expects($this->once())
         ->method('create')
         ->willReturn($this->redirectMock);


        $this->redirectMock->expects($this->once())
         ->method('setPath')
         ->with('mastering/index/index')
         ->willReturnSelf();

         $this->itemMock->expects($this->once())
         ->method('setData')
         ->with('test')
         ->willReturnSelf();

         $this->itemMock->expects($this->once())
         ->method('save')
         ->willReturnSelf();

        $result = $this->save->execute();

        $this->assertEquals($this->redirectMock, $result);

    }

}
