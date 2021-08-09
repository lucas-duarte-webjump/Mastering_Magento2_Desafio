<?php

namespace Mastering\SampleModule\Block;

use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\View\Element\Template;
use Mastering\SampleModule\Model\ConfigLog;
use Mastering\SampleModule\Model\ResourceModel\Item\Collection;
use Mastering\SampleModule\Model\ResourceModel\Item\CollectionFactory;

class Hello extends Template
{
    private $eventManager;
    private $collectionFactory;
    private $config;


    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = [],
        ManagerInterface $eventManager,
        ConfigLog $config
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->eventManager = $eventManager;
        $this->config = $config;
        parent::__construct($context, $data);
    }

    /**
     * @return \Mastering\SampleModule\Model\Item[]
     */
    public function getItems()
    {
        if($this->config->isEnabled()) {
            $this->eventManager->dispatch('inside_table_page');
        }
        return $this->collectionFactory->create()->getItems();
    }
}
