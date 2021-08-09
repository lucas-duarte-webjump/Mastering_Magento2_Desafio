<?php
namespace Mastering\SampleModule\Controller\index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class index extends Action
{

    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
