<?php
namespace Mastering\SampleModule\Test\Unit\Controller\Index;

use Mastering\SampleModule\Controller\Index;
use PHPUnit\Framework\TestCase;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class indexTest extends TestCase
{

    private $index;
    private $contextMock;
    private $pageFactoryMock;
    private $pageMock;

    protected function setUp(): void
    {
        $this->contextMock = $this->createMock(Context::class);
        $this->pageFactoryMock = $this->createMock(PageFactory::class);
        $this->pageMock = $this->createMock(Page::class);

        $this->index = new Index\index($this->contextMock, $this->pageFactoryMock);

        $this->assertInstanceOf(Index\index::class, $this->index);
    }


    public function testIndexControllerReturnPage()
    {
        $this->pageFactoryMock
            ->method('create')
            ->willReturn($this->pageMock);

        $this->assertEquals($this->pageMock, $this->index->execute());
    }

}
