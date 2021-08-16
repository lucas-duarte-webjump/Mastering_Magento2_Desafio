<?php
namespace Mastering\SampleModule\Test\Unit\Model;

use Mastering\SampleModule\Model\ItemRepository;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;
use Magento\Framework\Data\Collection;
use PHPUnit\Framework\TestCase;

class ItemRepositoryTest extends TestCase
{

    private ItemRepository $itemRepository;
    private $collectionFactoryMock;
    private $collectionMock;


    protected function setUp(): void {
        $this->collectionFactoryMock = $this->createMock(CollectionFactory::class);
        $this->collectionMock = $this->createMock(Collection::class);
        $this->itemRepository = new ItemRepository($this->collectionFactoryMock);

        $this->assertInstanceOf(ItemRepository::class, $this->itemRepository);
    }


    public function testVerifyListItemHaveItem()
    {
        $this->collectionFactoryMock
        ->expects($this->once())
        ->method('create')
        ->willReturn($this->collectionMock);

        $this->collectionMock
        ->method('getItems')
        ->willReturn([1, 2, 3, 4, 5]);

        $this->assertCount(5, $this->itemRepository->getList());
    }


}
