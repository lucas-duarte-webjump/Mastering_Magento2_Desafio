<?php
namespace Mastering\SampleModule\Test\Unit\Controller\Adminhtml\Index;

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use PHPUnit\Framework\TestCase;
use Mastering\SampleModule\Controller\Adminhtml\Index;

class IndexTest extends TestCase
{

    private $resultPageFactoryMock;
    private $contextMock;
    private $indexAdmin;
    private $pageMock;

    protected function setUp(): void
    {
        $this->resultPageFactoryMock = $this->createMock(PageFactory::class);
        $this->contextMock = $this->createMock(Context::class);
        $this->pageMock = $this->createMock(Page::class);

        $this->indexAdmin = new Index\index($this->contextMock, $this->resultPageFactoryMock);

        $this->assertInstanceOf(Index\index::class, $this->indexAdmin);
    }

    public function testControllerReturnPage()
    {
        $this->resultPageFactoryMock
        ->method('create')
        ->willReturn($this->pageMock);

        $this->assertEquals($this->pageMock, $this->indexAdmin->execute());
    }

}
