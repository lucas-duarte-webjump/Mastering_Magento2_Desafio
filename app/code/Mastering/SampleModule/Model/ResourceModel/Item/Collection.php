<?php
namespace Mastering\SampleModule\Model\ResourceModel\Item;

use Mastering\SampleModule\Model\Item;
use Mastering\SampleModule\Model\ResourceModel\Item as ItemResource;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * @codeCoverageIgnore
 */
class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Item::class, ItemResource::class);
    }
}
